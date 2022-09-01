<?php

namespace App\Http\Requests\Api\Auth;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Models\User;
use App\Models\VerifyAccounts;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed code
 * @property mixed type
 */
class VerifyForm extends ApiRequest
{
    public function rules(): array
    {
        return [
            'country_code'=>'required',
            'mobile'=>'required|exists:users,mobile',
            'code' => 'required|string',

        ];
    }
    public function run(): JsonResponse
    {
        $logged = User::where('country_code', $this->country_code)->where('mobile', $this->mobile)->first();
        if (!$logged){
            return $this->failJsonResponse(__('auth.failed'));
        }
        $verify = VerifyAccounts::where('user_id',$logged->id)->where('type',2)->first();
        if (empty($verify->code) ){
            return $this->failJsonResponse([__('auth.failed')]);
        }
        if($this->code != $verify->code) {
            return $this->failJsonResponse([__('auth.failed')]);
        }
        if ($this->type == Constant::VERIFICATION_TYPE['Mobile']) {

            $logged->mobile_verified_at = now();
        }
        $logged->save();
        DB::table('oauth_access_tokens')->where('user_id', $logged->id)->delete();
        $tokenResult = $logged->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();

            if (!(Auth::loginUsingId($logged->getId()))){
                return $this->failJsonResponse([__('auth.failed')]);
            }
            else{
                $user = $this->user();
                if (!$user->is_active){
                    return $this->failJsonResponse([__('auth.blocked')]);
                }else{
                    DB::table('oauth_access_tokens')->where('user_id', $user->id)->delete();
                    $tokenResult = $user->createToken('Personal Access Token');
                    $token = $tokenResult->token;
                    $token->save();
                    if ($this->filled('device_token')) {
                        $user->setDeviceToken($this->device_token);
                        $user->setDeviceType($this->device_type);
                        $user->save();
                    }
                }


            }

        return $this->successJsonResponse( [__('auth.login')], new UserResource($logged,$tokenResult->accessToken),'User');
    }
}
