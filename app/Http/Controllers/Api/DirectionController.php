<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Direction;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class DirectionController extends Controller {
    public function getDirection(Request $request): JsonResponse {
        $directions = Direction::all();

        return returnSuccessResponse('All directions', $directions);
    }

    public function createDirection(Request $request): JsonResponse {
        $data = $request->all();
        $province = Province::find($data['province_id']);
        $direction = $province->direction()->create(['direction_way' => $data['direction_way']]);

        return returnSuccessResponse('Direction created successfully!', $direction);
    }

}
