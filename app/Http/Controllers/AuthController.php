<?php

namespace App\Http\Controllers;

use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;

class AuthController extends AccessTokenController
{
    //
    use JsonResponse;
    public function issueToken(ServerRequestInterface $request)
    {
        $data=null;
        $message=null;
        $status_code=200;
        try{
            $tokenResponse = parent::issueToken($request);
            $token = $tokenResponse->getContent();
            $data = json_decode($token, true);
            $message=__('messages.operation_successful');
        }
        catch (\Exception $e){
            Log::error($e);
            $message=__('messages.operation_failed');
            $status_code=400;
        }
        finally{
            return $this->response($data,$message,$status_code);
        }
    }
    
}
