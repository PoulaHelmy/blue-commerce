<?php

namespace App\Http\Controllers\Traits;

trait ResponseHandler
{
    public function errorResponse($statusCode = 400, $msg = 'Bad Request')
    {
        return response()->json([
            'status' => false,
            'msg' => $msg
        ], $statusCode);
    }

    public function successfulResponse($msg = 'Operation Successful', $statusCode = 200)
    {
        return response()->json([
            'status' => true,
            'msg' => $msg
        ], $statusCode);
    }

    public function responseData($key, $value, $statusCode = 200, $msg = "Successful Operation")
    {
        return response()->json([
            'status' => true,
            'msg' => $msg,
            $key => $value
        ], $statusCode);
    }
}
