<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProvinceController extends Controller {
    public function getProvince(Request $request): JsonResponse {
        $province = Province::all();

        return returnSuccessResponse('All provinces', $province);
    }
    public function getProvinceDirections(Request $request): JsonResponse {
        $provinceId = $request->all()['provinceId'];
        $province = Province::find($provinceId)->direction;

        return returnSuccessResponse('Province directions', $province);
    }

    public function createProvince(Request $request): JsonResponse {
        $rules = [
            'name' => 'required|unique:provinces',
            'city_id' => 'required',
        ];
        $message = [
            'name.required' => 'Please provide a province name!',
            'city_id.required' => 'City id is missing!'
        ];

        $inputArr = $request->all();
        $validator = Validator::make($inputArr, $rules,$message);
        if ($validator->fails()) {
            $validateerror = $validator->errors()->all();
            return returnValidationErrorResponse($validateerror[0]);
        }

        $city = City::find($inputArr['city_id']);
        $province = $city->province()->create(['name' => $inputArr['name']]);

        return returnSuccessResponse('Province saved successfully', $province);

    }
}

