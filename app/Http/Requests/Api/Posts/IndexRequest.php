<?php

namespace App\Http\Requests\Api\Posts;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class IndexRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function run(): JsonResponse
    {
        $Objects = new Post();

        if($this->filled('type')){
                $Objects = $Objects->where('type', $this->type);
        }

        if ($this->filled('q')) {
            $q = $this->q;
            $Objects = $Objects->where(function ($query) use ($q){
                return $query->where('title','Like','%'.$q.'%')
                    ->orWhere('title_ar','Like','%'.$q.'%')
                    ->orWhere('description','Like','%'.$q.'%')
                    ->orWhere('description_ar','Like','%'.$q.'%');
            });
        }
        $Objects = $Objects->orderBy('created_at', 'desc')->paginate($this->filled('per_page')?$this->per_page:10);
        return $this->successJsonResponse([], PostResource::collection($Objects->items()),'Posts' , $Objects);
    }
}
