<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiRequest;
use \App\Http\Resources\Api\User\UserResource;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
    public function run(): JsonResponse
    {
        $user = auth()->user();
//        if (is_null($user->mobile_verified_at))
//            return $this->failJsonResponse([__('auth.unactivated')],205);
        if (!$user->is_active)
            return $this->failJsonResponse([__('auth.blocked')]);
        $user->save();
        return $this->successJsonResponse([],new UserResource($user,$this->bearerToken()),'User');
    }
}
