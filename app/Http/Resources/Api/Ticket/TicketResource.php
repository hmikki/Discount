<?php

namespace App\Http\Resources\Api\Ticket;

use App\Http\Resources\Api\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = $this->getName();
        $Objects['email'] = $this->getEmail();
        $Objects['user'] = new UserResource($this->user);
//        $Objects['title'] = $this->getTitle();
        $Objects['message'] = $this->getMessage();
//        $Objects['attachment'] = $this->getAttachment();
        $Objects['status'] = $this->getStatus();
        $Objects['TicketResponses'] = TicketResponseResource::collection($this->ticket_responses);
        return $Objects;
    }
}
