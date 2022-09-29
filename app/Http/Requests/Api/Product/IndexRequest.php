<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Product\CartResource;
use App\Http\Resources\Api\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class IndexRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function run(): JsonResponse
    {
        $Objects = new Product();
        if ($this->filled('category_id')) {
            $Objects = $Objects->where('category_id',$this->category_id);
        }
        if ($this->filled('q')) {
            $q = $this->q;
            $Objects = $Objects->where(function ($query) use ($q){
                return $query->where('name','Like','%'.$q.'%')
                    ->orWhere('name_ar','Like','%'.$q.'%')
                    ->orWhere('description','Like','%'.$q.'%')
                    ->orWhere('description_ar','Like','%'.$q.'%');
            });
        }
        $Objects = $Objects->paginate($this->filled('per_page')?$this->per_page:10);
        return $this->successJsonResponse([],ProductResource::collection($Objects->items()), 'Product', $Objects);
    }
}
