<?php

namespace App\Http\Resources\Api\Discount;

use App\Helpers\Functions;
use App\Http\Resources\Api\Home\CountryResource;
use App\Http\Resources\Api\Site\SiteResource;
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
        $Objects['site'] = new SiteResource($this->site);
        $Objects['country'] = new CountryResource($this->country);
        $Objects['category'] = new CategoryResource($this->category);
        $Objects['name'] = (app()->getLocale() == 'ar')? $this->getNameAr(): $this->getName();
        $Objects['image'] = asset($this->getImage());
        $Objects['url'] = $this->getUrl();
        $Objects['type'] = __('crud.Discounts.types.'.$this->getType());
        $Objects['expire_date'] = Carbon::parse($this->getExpireDate());
        $Objects['qrcode'] = $this->getQrcode();
        return $Objects;

    }
}
