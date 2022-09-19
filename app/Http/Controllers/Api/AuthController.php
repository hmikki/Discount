<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ActivateUserRequest;
use App\Http\Requests\Api\Auth\CheckCodeRequest;
use App\Http\Requests\Api\Auth\ForgetPasswordRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\LogoutRequest;
use App\Http\Requests\Api\Auth\PasswordRequest;
use App\Http\Requests\Api\Auth\ProfileRequest;
use App\Http\Requests\Api\Auth\RefreshRequest;
use App\Http\Requests\Api\Auth\RegistrationRequest;
use App\Http\Requests\Api\Auth\ResendVerifyRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\Auth\updateRequest;
use App\Http\Requests\Api\Auth\VerifyForm;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ResponseTrait;
    public function register(RegistrationRequest $request): JsonResponse
    {
        return $request->persist();
    }
    public function check_code(CheckCodeRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function login(LoginRequest $request): JsonResponse
    {
        return $request->persist();
    }
    public function verify(VerifyForm $request): JsonResponse
    {
        return $request->run();
    }
     public function show(ProfileRequest $request): JsonResponse
     {
         return $request->run();
     }
    public function logout(LogoutRequest $request): JsonResponse
    {
        return $request->run();

    }
    public function update(updateRequest $request): JsonResponse
    {
        return $request->run();
    }
     public function resend_verify(ResendVerifyRequest $request): JsonResponse
     {
         return $request->run();
     }

     public function refresh(RefreshRequest $request): JsonResponse
     {
          return $request->run();
     }
    public function activate(ActivateUserRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function forget_password(ForgetPasswordRequest $request): JsonResponse
    {
        return $request->persist();
    }
    public function reset_password(ResetPasswordRequest $request): JsonResponse
    {
        return $request->persist();
    }
    public function update_password(PasswordRequest $request): JsonResponse
    {
        return $request->persist();
    }
}
