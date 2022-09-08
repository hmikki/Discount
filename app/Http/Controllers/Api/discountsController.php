<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\discounts\indexRequest;
use App\Http\Requests\Api\discounts\showRequest;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class discountsController extends Controller

{
    use ResponseTrait;
    public function index(indexRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function show(showRequest $request): JsonResponse
    {
        return $request->run();
    }
}
