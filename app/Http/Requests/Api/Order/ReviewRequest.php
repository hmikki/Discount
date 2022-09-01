<?php

namespace App\Http\Requests\Api\Order;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Discount\ReviewResource;
use App\Models\Media;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed product_id
 * @property mixed rate
 * @property mixed review
 */
class ReviewRequest extends ApiRequest
{
    use ResponseTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'provider_id'=>'required|exists:users,id',
            'rate'=>'required|numeric',
            'review'=>'string'
        ];
    }

    public function persist(): JsonResponse
    {
        $logged = auth()->user();
        if ($logged->getType() != Constant::USER_TYPE['Customer']){
            return $this->failJsonResponse([__('auth.unauthorized')]);
        }
        $Object = new Review();
        $Object->setUserId($logged->getId());
        $Object->setProviderId($this->provider_id);
        $Object->setRate($this->rate);
        $Object->setReview($this->review);
        $Object->save();
        return $this->successJsonResponse([__('messages.updated_successful')],new ReviewResource($Object),'Review');
    }
}
