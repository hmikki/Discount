<?php

namespace App\Http\Requests\Api\Posts;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class ShowRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'post_id'=>'required|exists:posts,id'
        ];
    }

    public function run(): JsonResponse
    {
        $Object = (new Post())->find($this->post_id);
        return $this->successJsonResponse([],new PostResource($Object),'Post');
    }
}
