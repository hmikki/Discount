<?php

namespace App\Http\Requests\Api\Chat;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Chat\ChatRoomResource;
use App\Models\ChatRoom;
use App\Models\ChatRoomUser;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed per_page
 * @property mixed user_id
 */
class CreateRoomRequest extends ApiRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
//            'user_id'=>'required|exists:users,id',
            'order_id'=>'required',
        ];
    }
    public function run(): JsonResponse
    {
        $order = Order::find($this->order_id);
        if (empty($order->getProviderId())){
            return $this->failJsonResponse([__('messages.wrong_sequence')]);
        }
        else{
        $logged = auth()->user();
        $LRoomsId = ChatRoomUser::where('user_id',$logged->getId())->pluck('chat_room_id')->toArray();
        $URoomsId = ChatRoomUser::where('user_id',$order->getProviderId())->pluck('chat_room_id')->toArray();
        $CR = ChatRoom::where('order_id', $this->order_id)->pluck('id')->toArray();
        $similarity = array_intersect($LRoomsId,$URoomsId, $CR);
        if (empty($similarity)) {
            $Object = new ChatRoom();
            $Object->setOrderId($this->order_id);
            $Object->save();
            $Object->refresh();
            if ($logged->getType() == Constant::USER_TYPE['Customer']) {
                $UObject = new ChatRoomUser();
                $UObject->setUserId($logged->getId());
                $UObject->setChatRoomId($Object->getId());
                $UObject->save();
                $LObject = new ChatRoomUser();
                $LObject->setUserId($order->getProviderId());
                $LObject->setChatRoomId($Object->getId());
                $LObject->save();
            }else{
                $UObject = new ChatRoomUser();
                $UObject->setUserId($logged->getId());
                $UObject->setChatRoomId($Object->getId());
                $UObject->save();
                $LObject = new ChatRoomUser();
                $LObject->setUserId($order->getUserId());
                $LObject->setChatRoomId($Object->getId());
                $LObject->save();
            }
        }else {
            $Object = (new ChatRoom())->whereIn('id',$similarity)->where('order_id', $this->order_id)->first();
        }
        return $this->successJsonResponse([],new ChatRoomResource($Object),'ChatRoom');

    }
    }
}
