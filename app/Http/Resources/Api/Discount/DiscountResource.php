<?php

namespace App\Http\Resources\Api\Discount;

use App\Helpers\Functions;
use App\Http\Resources\Api\Home\CountryResource;
use App\Http\Resources\Api\Site\SiteResource;
use App\Models\Favourite;
use App\Models\DiscountCountry;
use App\Models\Country;
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
        $countries = DiscountCountry::where('discount_id', $this->getId())->get();
//        $Objects['country'] = CountryResource::collection(Country::where('id', $countries->getCountryId())->get());
        $Objects['country'] = $countries;
        $Objects['category'] = new CategoryResource($this->category);
        $Objects['name'] = (app()->getLocale() == 'ar')? $this->getNameAr(): $this->getName();
        $Objects['description'] = (app()->getLocale() == 'ar')? $this->getDescriptionAr(): $this->getDescription();
        $Objects['image'] = asset($this->getImage());
        $Objects['code'] = $this->getCode();
        $Objects['url'] = $this->getUrl();
        $Objects['type'] = $this->getType();
        $Objects['value'] = $this->getValue();
        $is_favorite = false;
        if (auth()->user()) {
            $is_favorite = (bool)Favourite::where('user_id',auth()->user()->getId())->where('discount_id',$this->id)->first();
        }
        $Objects['is_favorite'] = $is_favorite;
        $Objects['expire_date'] = Carbon::parse($this->getExpireDate());
        $Objects['qrcode'] = $this->getQrcode();
        return $Objects;

    }
}
