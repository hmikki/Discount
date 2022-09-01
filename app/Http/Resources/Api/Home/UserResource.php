<?php

namespace App\Http\Resources\Api\Home;


use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        $Object['id'] = $this->getId();
        $Object['name'] = $this->getName();
        $Object['mobile'] = $this->getMobile();
        $Object['bio'] = $this->getBio();
        $Object['type'] = $this->getType();
        $Object['provider_type'] = $this->getProviderType();
        $Object['image'] = $this->getImage();
         $Object['status'] = $this->getStatus();
         $Object['id_number'] = $this->getIdNumber();
         $Object['side_name'] = $this->getSideName();
         $Object['record_number'] = $this->getRecordNumber();
         $Object['rate'] = $this->getRate();
         $Object['attachments'] = MediaResource::collection($this->attachments);
         $Object['ex_certificates'] = MediaResource::collection($this->ex_certificates);
         $Object['college_documents'] = MediaResource::collection($this->college_documents);
         $Object['is_active'] = $this->isIsActive();
        $Object['email_verified'] = (bool)$this->email_verified_at;
        $Object['mobile_verified'] = (bool)$this->mobile_verified_at;
        $Object['notification_count'] = $this->notifications()->where('read_at',null)->count();
        $Object['access_token'] = $this->token;
        $Object['token_type'] = 'Bearer';
        return $Object;
    }

}
