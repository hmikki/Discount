<?php

namespace App\Http\Requests\Api\Order;

use App\Models\OrderOffers;
use Illuminate\Http\JsonResponse;
use App\Models\Order;
use App\Traits\ResponseTrait;
use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Discount\DiscountResource;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed per_page
 * @property mixed is_completed
 */
class IndexRequest extends ApiRequest
{
    public function run():JsonResponse
    {
        $logged = auth()->user();

        $Objects = new Order();
        if($logged->getType() == Constant::USER_TYPE['Customer']){
            $Objects = $Objects->where('user_id',$logged->getId());
        }else{
            $order_ids = [];
            foreach ($Objects->get() as $key=>$item){
                $flag = OrderOffers::where('order_id', $item->getId())->where('provider_id', '!=', Auth::id())->get();
                if ($flag->count() >= 3){
                    array_push($order_ids, $item->getId());
                }
            }
            $Objects = $Objects->where('category_id', $logged->getCategoryId());
                $offer = OrderOffers::where('provider_id', $logged->getId())->where('status', '!=', 0)->pluck('order_id');
                if ($offer || $order_ids){
                    $Objects = $Objects->whereIn('id', $offer)->whereNotIn('id', $order_ids)->orWhere('category_id', $logged->getCategoryId());
                }
                else{
                    $Objects = $Objects->where('category_id', $logged->getCategoryId());
                }
        }
        if ($this->filled('is_complete') && $this->is_complete) {
            $Objects = $Objects->whereIn('status',Constant::COMPLETED_ORDER_STATUSES);
        }else{
            $Objects = $Objects->whereNotIn('status',Constant::COMPLETED_ORDER_STATUSES);
        }
        $Objects = $Objects->paginate($this->filled('per_page')?$this->per_page:10);
        $Objects = DiscountResource::collection($Objects);
        return $this->successJsonResponse([],$Objects->items(),'Orders',$Objects);
    }
}
