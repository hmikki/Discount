<?php

namespace App\Http\Requests\Api\Order;

use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Discount\DiscountResource;
use App\Models\Order;
use App\Helpers\Constant;
use App\Models\OrderOffers;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed order_id
 * @property mixed status
 * @property mixed reject_reason
 * @property mixed cancel_reason
 */
class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'order_id'=>'required|exists:orders,id',
            'status'=>'required|in:'.Constant::ORDER_STATUSES_RULES,
            'price'=>'required_if:status,'.Constant::ORDER_STATUSES['Provider_Accept'],
        ];
    }

    public function run(): JsonResponse
    {
        $Object = (new Order)->find($this->order_id);
        switch ($this->status){
            case Constant::ORDER_STATUSES['Provider_Accept']:{
                if ($Object->getStatus() !=Constant::ORDER_STATUSES['New']) {
                    return $this->failJsonResponse([__('messages.wrong_sequence')]);
                }
//                dd((bool)((int)$this->price > (int)$Object->category->getMaxPrice()));die();
                //**** if the price out of the service price range return fail ****//
                if ((((int)$this->price) > ((int)$Object->category->getMaxPrice())) || (((int)$this->price) < ((int)$Object->category->getMinPrice()))){
                    return $this->failJsonResponse([__('messages.price_error')]);
                }
                //**** if the provider apply on order and the order is not finished return fail ****//
                $make_offer = OrderOffers::where('provider_id', Auth::id())->pluck('order_id');
                $offer_order_status = Order::whereIn('id',$make_offer)->where('status','!=', Constant::ORDER_STATUSES['Finished'])->count();
                if ($offer_order_status > 0){
                    return $this->failJsonResponse([__('messages.cannot_make_offer')]);
                }
                //***** if the order has 3 offers cannot create new offer and return fail *****//
                $has_three_offer = OrderOffers::where('order_id', $this->order_id)->count();
                if ($has_three_offer >= 3){
                    return $this->failJsonResponse([__('messages.cannot_make_offer')]);
                }
                $offer = new OrderOffers();
                $offer->setProviderId(Auth::id());
                $offer->setOrderId($Object->getId());
                $offer->setPrice($this->price);
                $offer->setStatus(1);
                $offer->save();
//                $Object->setStatus(Constant::ORDER_STATUSES['Provider_Accept']);
                $Object->save();
//                Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['Provider_Accept']);
                Functions::SendNotification($Object->user,'New Offer','You Have New Offer !','عرض جديد !','لديك عرض سعر جديد',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
                break;
            }
            case Constant::ORDER_STATUSES['Provider_Rejected']:{
            if ($Object->getStatus() !=Constant::ORDER_STATUSES['New']) {
                return $this->failJsonResponse([__('messages.wrong_sequence')]);
            }
                $p_offer = new OrderOffers();
                $p_offer->setOrderId($Object->getId());
                $p_offer->setPrice(0);
                $p_offer->setStatus(0);
                $p_offer->setChangedBy(Auth::id());
                $p_offer->save();
//            $Object->setStatus(Constant::ORDER_STATUSES['New']);
            $Object->save();
//            Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['New']);
//            Functions::SendNotification($Object->user,'Order Rejected','Provider Rejected your order !','الرفض على الطلب !','قام المزود برفض طلبك',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
            break;
        }

            case Constant::ORDER_STATUSES['Customer_Accept']:{
                $offer_status = OrderOffers::where('id', $this->offer_id)->where('status',1)->whereNull('changed_by')->first();
                if (!$offer_status) {
                    return $this->failJsonResponse([__('messages.wrong_sequence')]);
                }
                $ca_offer = (new OrderOffers())->find($this->offer_id);
                $ca_offer->setStatus(1);
                $ca_offer->setChangedBy(Auth::id());
                $ca_offer->save();
                $Object->setProviderId($ca_offer->getProviderId());
                $Object->setAmount($ca_offer->getPrice());
                $Object->setStatus(Constant::ORDER_STATUSES['Customer_Accept']);
                $Object->save();
                Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['Customer_Accept']);
                Functions::SendNotification($Object->provider,'Order Accept','Customer Accepted your offer !','الموافقة على العرض !','قام المزود بالموافقة على عرضك',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
                break;
            }
            case Constant::ORDER_STATUSES['Customer_Rejected']:{
                $c_offer_status = OrderOffers::where('id', $this->offer_id)->where('status',1)->whereNull('changed_by')->first();
                if (!$c_offer_status) {
                    return $this->failJsonResponse([__('messages.wrong_sequence')]);
                }
                $ca_offer = (new OrderOffers())->find($this->offer_id);
                $ca_offer->setStatus(0);
                $ca_offer->setChangedBy(Auth::id());
                $ca_offer->save();
//            $Object->setStatus(Constant::ORDER_STATUSES['Customer_Rejected']);
                $Object->save();
//            Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['New']);
//            Functions::SendNotification($Object->user,'Order Rejected','Provider Rejected your order !','الرفض على الطلب !','قام المزود برفض طلبك',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
                break;
            }
            case Constant::ORDER_STATUSES['InProgress']:{
                if ($Object->getStatus() !=Constant::ORDER_STATUSES['Customer_Accept']) {
                    return $this->failJsonResponse([__('messages.wrong_sequence')]);
                }
                $Object->setStatus(Constant::ORDER_STATUSES['InProgress']);
                $Object->save();
                Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['InProgress']);
                Functions::SendNotification($Object->user,'Order In Progress','Provider start work your order !','الطلب قيد التنفيذ !','قام المزود ببدء العمل',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
                break;
            }

            case Constant::ORDER_STATUSES['Finished']:{
                if ($Object->getStatus() !=Constant::ORDER_STATUSES['InProgress']) {
                    return $this->failJsonResponse([__('messages.wrong_sequence')]);
                }
                $Object->setStatus(Constant::ORDER_STATUSES['Finished']);
                $Object->save();
                Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['Finished']);
                Functions::SendNotification($Object->user,'Order Finished','Provider Finished the order !','تم إنهاء الطلب','قام التقني بإنهاء الطلب',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
                break;
            }
        }
        $Object->save();
        return $this->successJsonResponse([__('messages.updated_successful')],new DiscountResource($Object),'Order');
    }
}
