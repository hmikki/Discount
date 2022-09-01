<?php

namespace App\Http\Resources\Api\Discount;

use App\Helpers\Functions;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Home\DelegateResource;
use App\Http\Resources\Api\User\UserResource;
use App\Http\Resources\Api\Home\CategoryResource;

class DiscountResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['qrcode'] = $this->getQrcode();
        $Objects['site'] = new SiteResource($this->site);
        $Objects['provider_id'] = $this->getProviderId();
        $Objects['provider'] = $this->provider?new UserResource($this->provider):null;
        $Objects['amount'] = $this->getAmount();
        $Objects['created_at'] = Carbon::parse($this->created_at);
        $Objects['order_date'] = $this->getOrderDate();
        $Objects['order_time'] = $this->getOrderTime();
        $Objects['reject_reason'] = $this->getRejectReason();
        $Objects['cancel_reason'] = $this->getCancelReason();
        $Objects['status'] = __('crud.Order.Statuses.'.$this->getStatus());
        $Objects['OrderDetails'] = OrderDetailsResource::collection($this->order_details);
        $Objects['OrderStatuses'] = OrderStatusResource::collection($this->order_statuses);
        $Objects['OrderOffers'] = OffersResource::collection($this->order_offer);
        return $Objects;

    }
}
