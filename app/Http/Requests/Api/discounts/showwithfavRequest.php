<?php

namespace App\Http\Requests\Api\discounts;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Discount\DiscountResource;
use App\Http\Resources\Api\specialties\specialtiesResource;
use App\Http\Resources\Api\User\UserResource;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class showwithfavRequest extends ApiRequest
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
        ];
    }
    public function run(): JsonResponse
    {
        return $this->successJsonResponse([],new DiscountResource(Discount::findOrFail($this->discount_id)), 'Discount');
    }
}
