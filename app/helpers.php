<?php

if(!function_exists('returnNotAuthorizedResponse')) {
    function returnNotAuthorizedResponse($message = '', $data = array()) {
        $returnArr = [
            'statusCode' => 401,
            'status' => 'error',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object)$data)
        ];

        return response()->json($returnArr, 401);
    }
}

if(!function_exists('return409Response')) {
    function return409Response($message = '', $data = array()) {
        $returnArr = [
            'statusCode' => 409,
            'status' => 'error',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object)$data)
        ];
        return response()->json($returnArr, 409);
    }
}

if (!function_exists('returnValidationErrorResponse')) {
    function returnValidationErrorResponse($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 422,
            'status' => 'vaidation error',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object)$data)
        ];
        return response()->json($returnArr, 422);
    }
}

if (!function_exists('returnNotFoundResponse')) {
    function returnNotFoundResponse($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 404,
            'status' => 'not found',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object)$data)
        ];
        return response()->json($returnArr, 404);
    }
}

if (!function_exists('returnSuccessResponse')) {
    function returnSuccessResponse($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 200,
            'status' => 'success',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object)$data)
        ];
        return response()->json($returnArr, 200);
    }
}

if (!function_exists('returnErrorResponse')) {
    function returnErrorResponse($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 500,
            'status' => 'error',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object)$data)
        ];
        return response()->json($returnArr, 500);
    }
}