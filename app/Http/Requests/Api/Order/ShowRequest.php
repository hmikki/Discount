<?php

namespace App\Http\Requests\Api\Order;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Discount\DiscountResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed order_id
 */

class ShowRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'order_id'=>'required|exists:orders,id',
        ];
    }
   public function run(): JsonResponse
   {
       return $this->successJsonResponse([], new DiscountResource((new Order())->find($this->order_id)), 'Order');
   }
}
