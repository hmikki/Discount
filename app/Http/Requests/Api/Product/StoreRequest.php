<?php

namespace App\Http\Requests\Api\Product;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Product\ProductResource;
use App\Models\Products;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Media;
use App\Models\ProductColor;
use App\Models\ProductSize;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StoreRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [

        ];
    }
    public function run(): JsonResponse
    {
        $product = new Product();
        $product->setName($this->name);
        $product->setDescription($this->description);
        $product->setDescriptionAr($this->description_ar);
        $product->setNameAr($this->name_ar);
        $product->setQuantity($this->quantity);
        $product->setOriginalPrice($this->original_price);
        $product->setOfferPrice($this->offer_price);
        $product->setActive(true);

        foreach ($this->media as $item) {
            $product_media = new Media();
            $product_media->setRefId($product->getId());
            $product_media->setMediaType(Constant::MEDIA_TYPE['Product']);
            $product_media->setFile($item);
            $product_media->save();
        }
        return $this->successJsonResponse([__('messages.saved_successfully')], new ProductResource($product), 'product');
    }
}
