<?php

namespace App\Http\Requests\Api\sections;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\sections\sectionsResource;
use App\Models\Sections;
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
        return $this->successJsonResponse([], sectionsResource::collection(Sections::all()));
    }
}
