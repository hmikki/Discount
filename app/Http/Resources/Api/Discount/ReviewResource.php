<?php

namespace App\Http\Resources\Api\Discount;

use App\Helpers\Constant;
use App\Http\Resources\Api\User\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['review'] = $this->getReview();
        $Objects['rate'] = $this->getRate();
        $Objects['username'] = $this->user->getName();
        $Objects['image'] = $this->user->getImage();
        $Objects['created_at'] = Carbon::parse($this->created_at)->format('Y/m/d');
        return $Objects;
    }
}
