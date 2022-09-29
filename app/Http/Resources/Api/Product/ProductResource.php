<?php

namespace App\Http\Resources\Api\Product;

use App\Helpers\Constant;
use App\Http\Resources\Api\Home\CategoryResource;
use App\Http\Resources\Api\Home\CountryResource;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Country;
use App\Models\Favorite;
use App\Models\Media;
use App\Models\Review;
use App\Models\SizePrice;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->id;
        $Objects['category_id'] = $this->category_id;
        $Objects['name'] = (app()->getLocale() == 'ar')? $this->name_ar: $this->name;
        $Objects['description'] = (app()->getLocale() == 'ar')? $this->description_ar: $this->description;
        $Objects['quantity'] = $this->quantity;
        $Objects['original_price'] = $this->original_price;
        $Objects['offer_price'] = $this->offer_price;
        $Objects['Media'] = $this->media? MediaResource::collection($this->media): null;
        $Objects['active'] = $this->active;
        return $Objects;
    }
}
