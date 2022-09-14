<?php

namespace App\Http\Resources\Api\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['title'] = (app()->getLocale() == 'ar')?$this->getTitleAr():$this->getTitle();
        $Objects['image'] = asset($this->getImage());
        $Objects['type'] = $this->getType();
        $Objects['url'] = $this->getUrl();
        $Objects['discount_id'] = $this->getDiscountId();
        return $Objects;
    }
}
