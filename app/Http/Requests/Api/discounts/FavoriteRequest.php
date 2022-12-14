<?php

namespace App\Http\Requests\Api\discounts;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Discount\DiscountResource;
use App\Models\Discount;
use App\Models\Favourite;
use Illuminate\Http\JsonResponse;

class FavoriteRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function run(): JsonResponse
    {
        $product_ids = (new Favourite())->where('user_id',auth()->user()->getId())->pluck('discount_id');
        $Objects = new Discount();
        $Objects = $Objects->whereIn('id',$product_ids)->orderBy('created_at','desc');

        $Objects = $Objects->paginate($this->filled('per_page')?$this->per_page:10);
        return $this->successJsonResponse([],DiscountResource::collection($Objects->items()),'Discounts',$Objects);
    }
}
