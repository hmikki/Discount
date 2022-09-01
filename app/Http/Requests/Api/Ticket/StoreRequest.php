<?php

namespace App\Http\Requests\Api\Ticket;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Ticket\TicketResource;
use App\Models\Ticket;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed title
 * @property mixed message
 * @property mixed email
 * @property mixed name
 */
class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'=>'string',
            'name'=>'string',
            'message'=>'required',
            'email'=>'nullable',
            'attachment'=>'sometimes|mimes:jpeg,jpg,png'
        ];
    }
    public function run(): JsonResponse
    {
        $Ticket =new  Ticket();
        $logged = auth('api')->user();
        if (!$logged){
            return $this->failJsonResponse([__('auth.unauthenticated')]);
        }
        $Ticket->setUserId($logged->getId());
        $Ticket->setName($this->name);
        $Ticket->setEmail($this->email);
        $Ticket->setMessage($this->message);
        if ($this->filled('title')) {
            $Ticket->setTitle($this->title);
        }
        if($this->hasFile('attachment')) {
            $Ticket->setAttachment($this->file('attachment'));
        }
        $Ticket->save();
        return $this->successJsonResponse([__('messages.saved_successfully')],new TicketResource($Ticket),'Ticket');
    }
}
