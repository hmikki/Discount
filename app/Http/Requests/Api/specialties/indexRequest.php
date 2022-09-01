<?php

namespace App\Http\Requests\Api\specialties;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
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
        $logged = auth()->user();
        if (!$logged){
            return $this->failJsonResponse([__('auth.unauthenticated')]);
        }
        $Objects =User::where('type', Constant::USER_TYPE['Provider']);
        $Objects = $Objects->paginate($this->filled('per_page')?$this->per_page:10);
        return $this->successJsonResponse([],UserResource::collection($Objects->items()),'Specialities',$Objects);

    }
}
