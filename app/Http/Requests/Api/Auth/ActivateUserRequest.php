<?php

namespace App\Http\Requests\Api\Auth;

use App\Traits\ResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Models\User;
use App\Models\VerifyAccounts;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivateUserRequest extends FormRequest
{
    use ResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }
    public function run(): JsonResponse
    {
        $Object = auth()->user();
        if (!$Object){
            return $this->failJsonResponse([__('auth.unauthenticated')]);
        }else {
            $Object->is_active = (!$Object->is_active);
            $Object->save();
            return $this->successJsonResponse([__('messages.updated_successful')]);
        }
    }
}
