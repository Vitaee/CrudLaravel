<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Jobs\S3FileUploadJob;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller {

    public function register(UserRegisterRequest $request, User $user){
        $userArr = $request->except(['profileImage']);
        $file = $request->file('profileImage');

        $userArr['profileImage'] = "empty";
        $userObj = $user->saveNewUser($userArr);


        if(!$userObj){
            return returnErrorResponse('Unable to register user. Please try again later');
        }

        $job = new S3FileUploadJob($file, $userObj->id);
        dispatch($job)->onQueue('s3_file_upload');

        //S3FileUploadJob::dispatch($file, $userObj->id)->delay(now()->addSecond(2));

        $authToken = $userObj->createToken('authToken')->plainTextToken;
        $userObj->auth_token = $authToken;

        return returnSuccessResponse('You are registered successfully. please verify phone number to proceed.', ['token' => $userObj->auth_token]);

    }

    public function login(UserLoginRequest $request)
    {
        $inputArr = $request->all();
        $userObj = User::where('email', $inputArr['email'])->first();
        if(!$userObj)
        {
            return returnNotFoundResponse('Email not found.');
        }



        if (!Auth::attempt(['email' => $inputArr['email'], 'password' => $inputArr['password']])) {
            return returnNotFoundResponse('Invalid credentials');
        }

        if ( ! Hash::check($inputArr['password'], $userObj->password, [])) {
            return returnNotFoundResponse('Invalid credentials');
        }

        $userObj->tokens()->delete();
        $authToken = $userObj->createToken('authToken')->plainTextToken;

        return returnSuccessResponse('User logged in successfully', $authToken);
    }


}