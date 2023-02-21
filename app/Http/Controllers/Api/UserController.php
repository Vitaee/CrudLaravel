<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function getProfile(Request $request): JsonResponse {
        $userObj = $request->user();

        if (!$userObj) {
            return returnNotAuthorizedResponse('User is not authorized!');
        }

        return returnSuccessResponse('User profile', $userObj);
    }
}

