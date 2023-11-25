<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function responseWithSuccess($data, $message)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'success_code' => 200,
        ]);
    }
    public function responseWithError($message)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => [],
            'success_code' => 201,
        ]);
    }
}
