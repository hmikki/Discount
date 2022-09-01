<?php

namespace App\Http\Resources\Api\Chat;

use App\Http\Resources\Api\User\UserResource;
use App\Models\ChatRoomMessage;
use App\Models\ChatRoomUser;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatRoomVideoMessageResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['order_id'] = $this->getOrderId();
        $Objects['sender_id'] = $this->getSenderId();
        $Objects['sender_name'] = $this->getSenderName();
        $Objects['sender_image'] = $this->getSenderImage();
        $Objects['received_id'] = $this->getReceiverId();
        $Objects['received_name'] = $this->getReceiverName();
        $Objects['received_image'] = $this->getReceiverImage();
        $Objects['action'] = $this->getAction();
        return $Objects;
    }
}
