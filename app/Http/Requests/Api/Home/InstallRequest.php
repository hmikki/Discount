<?php

namespace App\Http\Requests\Api\Home;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\AdvertisementResource;
use App\Http\Resources\Api\Home\CategoryResource;
use App\Http\Resources\Api\Home\CountryResource;
use App\Http\Resources\Api\Home\SplashScreensResource;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Country;
use App\Models\Food;
use App\Models\OrderDetails;
use App\Models\Setting;
use App\Models\SplashScreen;
use Illuminate\Http\JsonResponse;

class InstallRequest extends ApiRequest
{
    public function run(): JsonResponse
    {

        $data = [];
        $data['Settings'] = Setting::pluck((app()->getLocale() == 'en') ? 'value' : 'value_ar', 'key')->toArray();
        $data['Countries'] = CountryResource::collection(Country::where('is_active', true)->get());
        $data['Categories'] = CategoryResource::collection(Category::where('is_active', true)->get());
        $data['Advertisements'] = AdvertisementResource::collection(Advertisement::where('is_active', true)->get());
        $data['SplashScreens'] = SplashScreensResource::collection(SplashScreen::where('active',true)->orderBy('order','desc')->get());
        $data['Essentials'] = [
            'NotificationType' => Constant::NOTIFICATION_TYPE,
            'VerificationType' => Constant::VERIFICATION_TYPE,
            'TicketStatuses'=>Constant::TICKETS_STATUS,
            'DiscountType'=>Constant::DISCOUNT_TYPE,
        ];
        return $this->successJsonResponse([], $data);
    }
}
