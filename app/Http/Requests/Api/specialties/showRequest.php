<?php

namespace App\Http\Requests\Api\specialties;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\specialties\specialtiesResource;
use App\Http\Resources\Api\User\UserResource;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class showRequest extends ApiRequest
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
            'user_id'=>'required|exists:users,id'
        ];
    }
    public function run(): JsonResponse
    {
        return $this->successJsonResponse([],new UserResource(User::findOrFail($this->user_id)), 'Specialist');
    }
}
