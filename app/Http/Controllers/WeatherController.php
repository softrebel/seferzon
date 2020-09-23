<?php

namespace App\Http\Controllers;

use App\Traits\JsonResponse;
use App\Traits\OpenWeatherMap;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class WeatherController extends Controller
{
    //
    use JsonResponse,OpenWeatherMap;
    public function getWeather(Request $request,$city)
    {
        $data=null;
        $message=null;
        $status_code=200;
        try{
            $weather=$this->getCityWeather($city);
            if($weather){
                $data=$weather;
                $message=__('messages.operation_successful');
            }else{
                $message=__('messages.operation_failed');
                $status_code=400;
            }
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
