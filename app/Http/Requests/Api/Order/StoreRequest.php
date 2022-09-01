<?php

namespace App\Http\Requests\Api\Order;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Discount\DiscountResource;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetails;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed product_id
 * @property mixed quantity
 * @property mixed note
 * @property mixed delivered_date
 * @property mixed delivered_time
 */
class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'category_id'=>'required|exists:categories,id',
            'details'=>'required|array',
        ];
    }

    public function run(): JsonResponse
    {
        $Object = new Order();
        $Object->setUserId(auth()->user()->getId());
        $Object->setCategoryId($this->category_id);
        $Object->setOrderDate(Carbon::now()->format('y-m-d'));
        $Object->setOrderTime(Carbon::now()->format('h:i:s'));
        $Object->setStatus(Constant::ORDER_STATUSES['New']);
        $Object->setAmount(0);
        $Object->save();
        $Object->refresh();
        foreach ($this->details as $key=>$item){
            $order_details = new OrderDetails();
            $order_details->setOrderId($Object->getId());
            $order_details->setType($item["type"]);
            if ($item["type"] == Constant::ORDER_TYPES['text']){
                $order_details->setValue($item["value"]);
            }elseif ($item["type"] == Constant::ORDER_TYPES['image'] || $item["type"] == Constant::ORDER_TYPES['voice'] || $item["type"] == Constant::ORDER_TYPES['file'] || $item["type"] == Constant::ORDER_TYPES['video']){
                $order_details->setValue(asset(Functions::StoreImageModel($item["value"], 'media/orders')));
            }else{
                $order_details->setValue($item["value"]);
            }
                $order_details->save();
        }

        Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['New']);
        return $this->successJsonResponse([__('messages.created_successful')],new DiscountResource($Object),'Order');

    }
}
