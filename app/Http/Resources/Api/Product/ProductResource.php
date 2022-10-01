<?php

namespace App\Http\Resources\Api\Product;

use App\Helpers\Constant;
use App\Http\Resources\Api\Home\CategoryResource;
use App\Models\Category;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['category_id'] = $this->category_id;
        $Objects['name'] = (app()->getLocale() == 'ar')? $this->name_ar: $this->name;
        $Objects['description'] = (app()->getLocale() == 'ar')? $this->description_ar: $this->description;
        $Objects['quantity'] = $this->quantity;
        $Objects['original_price'] = $this->original_price;
        $Objects['offer_price'] = $this->offer_price;
        $Objects['Media'] = MediaResource::collection(Media::where('ref_id', $this->getId())->get());
        $Objects['active'] = $this->active;
        return $Objects;
    }
}
