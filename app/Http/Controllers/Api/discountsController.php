<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\discounts\FavoriteRequest;
use App\Http\Requests\Api\discounts\indexRequest;
use App\Http\Requests\Api\discounts\showRequest;
use App\Http\Requests\Api\discounts\showwithfavRequest;
use App\Http\Requests\Api\discounts\ToggleFavoriteRequest;
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
    public function show_with_fav(showwithfavRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function favorites(FavoriteRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function toggle_favorite(ToggleFavoriteRequest $request): JsonResponse
    {
        return $request->persist();
    }
}
