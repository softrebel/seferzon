<?php
/**
 * Created by PhpStorm.
 * User: MohammadReza
 * Date: 9/23/2020
 * Time: 7:14 PM
 */

namespace App\Traits;


trait JsonResponse
{
    public function response($data=null,$message=null,$status_code=200)
    {
        $result=[
            "message"=>$message,
            "data"=>$data
        ];
        return response()->json($result, $status_code);
    }
}
