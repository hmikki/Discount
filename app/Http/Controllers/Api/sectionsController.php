<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\sections\indexRequest;
use App\Http\Requests\Api\sections\showRequest;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class sectionsController extends Controller
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
