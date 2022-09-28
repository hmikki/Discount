<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Posts\DeleteRequest;
use App\Http\Requests\Api\Posts\MyPostRequest;
use App\Http\Requests\Api\Posts\StoreRequest;
use App\Http\Requests\Api\Posts\UpdatePostStatusRequest;
use App\Http\Requests\Api\Posts\UpdateRequest;
use App\Http\Requests\Api\Posts\IndexRequest;
use App\Http\Requests\Api\Posts\ShowRequest;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    use ResponseTrait;

    public function index(IndexRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function show(ShowRequest $request): JsonResponse
    {
        return $request->run();
    }
}
