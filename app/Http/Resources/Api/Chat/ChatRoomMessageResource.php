<?php

namespace App\Http\Resources\Api\Chat;

use App\Http\Resources\Api\User\UserResource;
use App\Models\ChatRoomMessage;
use App\Models\ChatRoomUser;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatRoomMessageResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['chat_room_id'] = $this->getChatRoomId();
        $Objects['message'] = $this->getMessage();
        $Objects['type'] = $this->getType();
        $Objects['user_id'] = $this->getUserId();
        $Objects['read_at'] = $this->getReadAt();
        $Objects['user_name'] = $this->user->getName();
        $CRU = ChatRoomUser::where('user_id','!=',auth()->user()->getId())->where('chat_room_id',$this->getChatRoomId())->first();
        $Objects['chater_User_id'] = $CRU->user->getId();
        $Objects['chater_User_name'] = $CRU->user->getName();
        $Objects['chater_User_image'] = $CRU->user->getImage();
        $Objects['chater_User_type'] = $CRU->user->getType();
        $Objects['created_at'] = Carbon::parse($this->created_at)->diffForHumans();
        $Objects['created_at_formatted'] = Carbon::parse($this->created_at)->format('Y-m-d H:i:s');
        return $Objects;
    }
}
