<?php

namespace App\Http\Requests\Api\discounts;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Discount\DiscountResource;
use App\Http\Resources\Api\Product\ProductResource;
use App\Models\Discount;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ToggleFavoriteRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules():array
    {
        return [
            'discount_id'=>'required|exists:discounts,id',
        ];
    }
    public function persist(): JsonResponse
    {
        $Discount = (new Discount())->find($this->discount_id);
        $logged = auth()->user();
        $Object = (new Favorite())->where('discount_id',$Discount->getId())->where('user_id',$logged->getId())->first();
        if (!$Object){
            $Object = new Favorite();
            $Object->setDiscountId($Discount->getId());
            $Object->setUserId($logged->getId());
            $Object->save();
        }else{
            $Object->delete();
        }
        return $this->successJsonResponse([__('messages.updated_successful')],new DiscountResource($Discount),'Discount');
    }
}
