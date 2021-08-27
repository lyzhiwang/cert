<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2019-03-24
 * Time: 16:56
 */

namespace App\Http\Controllers;


trait Result
{
    public function success($code = 200, $data = [], $message = '')
    {
        return response()->json([
            'code' => 0,
            'data' => $data,
            'message' => $message
        ], $code);
    }

    public function error($message, $code = 200, $error_code = 710000, $data = [])
    {
        return response()->json([
            'code' => $error_code,
            'data' => $data,
            'message' => $message,
        ], $code);
    }

    public function failed($message, $code = 200, $error_code = 720000, $data = [])
    {
        return response()->json([
            'code' => $error_code,
            'data' => $data,
            'message' => $message,
        ], $code);
    }

    public function response($res, $data, $message, $code = 200)
    {
        return response()->json([
            'code' => $res ? 0 : 201,
            'data' => $res ? $data : $res,
            'message' => $res ? '' : $message,
        ], $code);
    }
}
