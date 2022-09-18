<?php

namespace App\Http\Requests\Api\discounts;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Discount\DiscountResource;
use App\Http\Resources\Api\User\UserResource;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class indexRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            //
        ];
    }
    public function run(): JsonResponse
    {
        $Objects =new  Discount();
        if ($this->filled('category_id')){
            $Objects= $Objects->where('category_id', $this->category_id);
        }
        if ($this->filled('site_id')){
            $Objects= $Objects->where('site_id', $this->site_id);
        }
        if($this->filled('q')){
            $Objects = $Objects->where('name','Like', '%'.$this->q.'%')
                ->orWhere('name_ar','Like', '%'.$this->q.'%')
                ->orWhere('description','Like', '%'.$this->q.'%')
                ->orWhere('description_ar','Like', '%'.$this->q.'%');
        }
        $Objects = $Objects->orderBy('created_at','desc');
        $Objects = $Objects->paginate($this->filled('per_page')?$this->per_page:10);
        return $this->successJsonResponse([],DiscountResource::collection($Objects->items()),'Discounts',$Objects);

    }
}
