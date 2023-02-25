<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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
        $province = $request->all();

        $province_instance = Province::create($province);
        return returnSuccessResponse('Province saved successfully', $province_instance);

    }
}

