<?php

namespace App\Http\Resources\Api\Food;

use App\Helpers\Constant;
use App\Http\Resources\Api\Home\CategoryResource;
use App\Http\Resources\Api\Home\MediaResource;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['category_id'] = $this->getCategoryId();
        $Objects['Category'] = new CategoryResource($this->category);
        $Objects['name'] = (app()->getLocale() == 'ar')?$this->getNameAr():$this->getName();
        $Objects['description'] = (app()->getLocale() == 'ar')?$this->getDescriptionAr():$this->getDescription();
        $Objects['price'] = $this->getPrice();
        $Objects['rate'] = $this->reviews()->avg('rate')??5;
        $Objects['is_fav'] = auth('api')->check() && (bool)Favourite::where('food_id', $this->getId())->where('user_id', auth('api')->user()->getId())->first();
        $Objects['Media'] = MediaResource::collection($this->media);
        return $Objects;
    }
}
