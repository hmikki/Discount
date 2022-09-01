<?php

namespace App\Http\Requests\Api\Auth;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed code
 * @property mixed email
 */
class CheckCodeRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'mobile'=>'required_if:type,'.Constant::VERIFICATION_TYPE['Mobile'].'|exists:users,mobile',
            'email'=>'required_if:type,'.Constant::VERIFICATION_TYPE['Email'].'|exists:users,email',
            'code' => 'required|string',
        ];
    }
    public function run(): JsonResponse
    {
        if ($this->filled('mobile')){
            $user = User::where('mobile',$this->email)->first();

        }elseif($this->filled('email')){
            $user = User::where('email',$this->email)->first();
        }
        $passwordReset = PasswordReset::where('user_id',$user->getId())->first();
        if($passwordReset &&$passwordReset->code == $this->code){
            return $this->successJsonResponse( [__('auth.code_correct')]);
        }
        else{
            return $this->failJsonResponse( [__('auth.code_not_correct')]);
        }
    }
}
