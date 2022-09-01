<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Order\IndexRequest;
use App\Http\Requests\Api\Order\ReviewRequest;
use App\Http\Requests\Api\Order\ShowRequest;
use App\Http\Requests\Api\Order\StoreRequest;
use App\Http\Requests\Api\Order\UpdateRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function show(ShowRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function UserOrder(IndexRequest $request): JsonResponse
    {

        return auth()->user()->getId();
    }
    public function store(StoreRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function update(UpdateRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function review(ReviewRequest $request): JsonResponse
    {
        return $request->persist();
    }
}
