<?php
/**
 * Created by PhpStorm.
 * User: MohammadReza
 * Date: 9/23/2020
 * Time: 7:14 PM
 */

namespace App\Traits;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait OpenWeatherMap
{


    public function getCityWeather($city)
    {
        $data=false;
        try{
            $url=config('weather.city_weather');
            $url = Str::replaceFirst('{city name}', $city, $url);
            $url = Str::replaceFirst('{API key}', env('WHEATER_API_KEY'), $url);
            $client = new Client();
            $res = $client->request('GET', $url);
            if($res->getStatusCode()=='200'){
                $data=json_decode($res->getBody(), true);
            }
        }
        catch (\Exception $e){
            Log::error($e);
        }
        finally{
            return $data;
        }
    }
}
