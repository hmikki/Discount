<?php

namespace App\Http\Requests\Api\Order;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Order\OrderResource;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class StoreRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'product_id'=>'required|exists:products,id',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required',
            'mobile' => 'required',
            'quantity' => 'required',
//            'total' => 'required',


        ];
    }

    public function run(): JsonResponse
    {
        $logged = auth('api')->user();
        $product = Product::find($this->product_id);
        $Order =new  Order();
        $Order->setUserId($logged->getId());
        $Order->setProductId($this->product_id);
        $Order->setCountryId($this->country_id);
        $Order->setCityId($this->city_id);
        $Order->setAddress($this->address);
        $Order->setMobile($this->mobile);
        $Order->setQuantity($this->quantity);
        $total = (int)($product->getPrice()) * $this->quantity ;
        $Order->setTotal($total);
        $Order->setStatus(Constant::ORDER_STATUSES['New']);
        $Order->save();

        Functions::ChangeOrderStatus($Order->getId(),Constant::ORDER_STATUSES['New']);
        return $this->successJsonResponse([__('messages.saved_successfully')],new OrderResource($Order),'Order');
    }
}
