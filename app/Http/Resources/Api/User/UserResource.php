<?php

namespace App\Http\Resources\Api\User;


use App\Http\Resources\Api\Home\CountryResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    protected $token;

    public function __construct($resource, $token = null)
    {
        $this->token = $token;
        parent::__construct($resource);
    }

    public function toArray($request): array
    {
        $Object['id'] = $this->getId();
        $Object['name'] = $this->getName();
        $Object['country_code'] = $this->getCountryCode();
        $Object['mobile'] = $this->getMobile();
        $Object['email'] = $this->getEmail();
        $Object['image'] = $this->getImage();
        $Object['country'] = new CountryResource($this->country);
        $Object['is_active'] = $this->isIsActive();
        $Object['email_verified'] = (bool)$this->email_verified_at;
        $Object['mobile_verified'] = (bool)$this->mobile_verified_at;
        $Object['notification_count'] = $this->notifications()->where('read_at',null)->count();
        $Object['access_token'] = $this->token;
        $Object['token_type'] = 'Bearer';
        return $Object;
    }

}
