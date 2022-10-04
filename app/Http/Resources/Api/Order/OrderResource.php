<?php

namespace App\Http\Resources\Api\Order;

use App\Http\Resources\Api\Product\ProductResource;
use App\Models\Discount;
use App\Models\Favorite;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->id;
        $Objects['user_id'] = $this->user_id;
        $Objects['product_id'] = $this->product_id;
        $Objects['product'] = new ProductResource(Product::find($this->product_id));
        $Objects['country_id'] = $this->country_id;
        $Objects['city_id'] = $this->city_id;
        $Objects['address'] = $this->address;
        $Objects['mobile'] = $this->mobile;
        $Objects['status'] = $this->status;
//        $Objects['order_status'] = OrderStatusResource::collection($this->order_status);
        $Objects['quantity'] = $this->quantity;
        $Objects['total'] = $this->total;
        $Objects['order_date'] = ($this->created_at)->format('y-m-d');
        $Objects['order_time'] = ($this->created_at)->format('h:m:s');
        return $Objects;
    }
}
