<?php

namespace App\Http\Requests\Api\Auth;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RegistrationRequest extends ApiRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|min:6|unique:users',
            'country_code'=>'required|exists:countries,country_code',
            'mobile' => 'required|numeric|min:6|unique:users',
            'password' => 'required|string|min:6',
            'country_id' => 'required|exists:countries,id',
            'device_token' => 'string|required_with:device',
            'device_type' => 'string|required_with:device_token',
        ];
    }
    public function attributes(): array
    {
        return [];
    }
    public function persist(): JsonResponse
    {
        $user = new User();
        $user->setName($this->name);
        $user->setEmail($this->email);
        $user->setCountryCode($this->country_code);
        $user->setMobile($this->mobile);
        $user->setPassword($this->password);
        $user->setCountryId($this->country_id);
        if ($this->filled('device_token') && $this->filled('device_type')) {
            $user->setDeviceToken($this->device_token);
            $user->setDeviceType($this->device_type);
        }
        $user->save();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        $user->refresh();
        try {
            Functions::SendVerification($user);
        }catch (\Exception $e) {
        }

        return $this->successJsonResponse( [__('auth.login')], new UserResource($user,$tokenResult->accessToken),'User');
    }

}
