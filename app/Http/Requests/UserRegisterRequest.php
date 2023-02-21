<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => 'required|email|unique:users,email,NULL,id',
            'name' => 'required',
            'password' => 'required',
            'profileImage' => 'mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Please enter name',

            'email.required'  => 'Please enter your email',
            'email.unique'  => 'This email already exist',
            'email.email'  => 'Please enter a valid email',

            'password.required' => 'Please enter the PIN',
            'password.max' => 'Please enter maximum 200 characters',

            'profileImage.max'  => 'The image may not be greater than 2 MB',
            'profileImage.mimes' => 'Thie file type should be jpeg|png|jpg'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errorMessages = $validator->errors()->all();
        throw new HttpResponseException(returnValidationErrorResponse($errorMessages[0]));
    }

}