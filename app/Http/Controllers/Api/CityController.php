<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller {
    public function getCities(Request $request): JsonResponse {
        $cities = City::all();
        return returnSuccessResponse('All cities', $cities);
    }

    public function getCityProvinces(Request $request): JsonResponse {
        $cityId = $request->all()['cityId'];
        $province = City::find($cityId)->province;

        return returnSuccessResponse('City provinces', $province);
    }

    public function createCity(Request $request): JsonResponse {
        $city = $request->all();

        $city_instance = City::create($city);
        return returnSuccessResponse('City saved successfully', $city_instance);

    }
}

