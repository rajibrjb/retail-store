<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Cache;
use Exception;
use Log;

class BaseController extends Controller
{


    public function __construct(){

	}

    protected function sendResponse($data=null, $message="", $reponse_code=200){
        return response()->json([
            'status' => 'ok',
            'data' => $data,
            'message' => $message
            ], $reponse_code);
    }

    protected function sendError($data=null, $message=null, $reponse_code=500){
        if($message==null)
            $message = Cache::get("settings.GENERIC_ERROR_MSG")->value;

        return response()->json([
            'status' => 'error',
            'data' => $data,
            'message' => $message
            ], $reponse_code);
    }
}
