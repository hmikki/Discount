<?php

namespace App\Http\Requests\Api\Home;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryRequest extends ApiRequest
{

    public function run(): JsonResponse
    {
        $Objects =new  Category();
        if($this->filled('q')){
            $Objects = $Objects->where('name','Like', '%'.$this->q.'%')
                ->orWhere('name_ar','Like', '%'.$this->q.'%')
                ->orWhere('description','Like', '%'.$this->q.'%')
                ->orWhere('description_ar','Like', '%'.$this->q.'%');
        }
        $Objects = $Objects->paginate($this->filled('per_page')?$this->per_page:10);
        return $this->successJsonResponse([],CategoryResource::collection($Objects->items()),'Categories',$Objects);
//        return $this->successJsonResponse([],CategoryResource::collection(Category::where('is_active',true)->get()),'Categories');
    }
}
