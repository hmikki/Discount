<?php

namespace App\Http\Resources\Api\specialties;

use Illuminate\Http\Resources\Json\JsonResource;

class specialtiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = $this->getName();
        $Objects['descriotion'] = $this->getDescription();
        $Objects['image'] = asset($this->getImage());
        return $Objects;
    }
}
