<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller {

    public function register(UserRegisterRequest $request, User $user){
        $userArr = $request->except(['profileImage']);
        $file = $request->file('profileImage');

        // Generate a unique file name
        $fileName = uniqid('', true) . '.' . $file->getClientOriginalExtension();

        // Upload the file to S3
        Storage::disk('s3')->put($fileName, file_get_contents($file), 'public');

        // Get the URL of the uploaded file
        $fileUrl = Storage::disk('s3')->url($fileName);

        $userArr['profileImage'] = $fileUrl;
        $userArr['name'] = $request->input("name");

        $userObj = $user->saveNewUser($userArr);

        if(!$userObj){
            return returnErrorResponse('Unable to register user. Please try again later');
        }

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