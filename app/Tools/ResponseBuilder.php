<?php
/**
 * Created by PhpStorm.
 * User: smigal
 * Date: 14/03/17
 * Time: 07:51 م
 */

namespace App\Tools;


trait ResponseBuilder
{

    public function createResponse($data = null,$code = null,$error_message = '',$errors = []){
        if($data != null){
            return $data;
        }
        if($code != null){
            return [
                "code"=>$code,
                "error_message"=>$error_message,
                "errors"=>$errors
            ];
        }
    }
}
