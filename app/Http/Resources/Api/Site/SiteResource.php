<?php

namespace App\Http\Resources\Api\Site;

use App\Helpers\Functions;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Home\DelegateResource;
use App\Http\Resources\Api\User\UserResource;
use App\Http\Resources\Api\Home\CategoryResource;

class SiteResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = (app()->getLocale() == 'ar')? $this->getNameAr() : $this->getName();
        $Objects['image'] = asset($this->getImage());
        $Objects['url'] = $this->getUrl();
        $Objects['is_active'] = (bool)$this->is_active;
        return $Objects;

    }
}
