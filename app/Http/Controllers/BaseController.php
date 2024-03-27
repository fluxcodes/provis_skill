<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [])
    {
        $response = [
            'success' => false,
            'error_code' => $error
        ];


        if (!empty($errorMessages)) {
            $response['message'] = $errorMessages;
        }


        return response()->json($response);
    }
}
