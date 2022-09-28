<?php

namespace App\Http\Resources\Api\Post;

use App\Http\Resources\Api\Home\MediaResource;
use App\Http\Resources\Api\Like\LikeResource;
use App\Http\Resources\Api\User\UserResource;
use App\Models\Like;
use App\Models\Post;
use App\Models\SenderNotification;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['title'] = (app()->getLocale() == 'ar')? $this->getTitleAr(): $this->getTitle();
        $Objects['description'] = (app()->getLocale() == 'ar')? $this->getDescriptionAr(): $this->getDescription();
        $Objects['date'] = $this->getDate();
        $Objects['image'] = asset($this->getImage());
        $Objects['type'] = $this->getType();
        return $Objects;
    }
}
