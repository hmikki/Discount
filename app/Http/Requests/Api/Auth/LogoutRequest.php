<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class LogoutRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            //
        ];
    }
    public function attributes(): array
    {
        return [];
    }
    public function run(): JsonResponse
    {
        $this->user()->update(['device_token' => null, 'device_type' => null]);
        $this->user()->token()->revoke();
        $this->user()->token()->delete();
        return $this->successJsonResponse([__('auth.logout')]);
    }
}
