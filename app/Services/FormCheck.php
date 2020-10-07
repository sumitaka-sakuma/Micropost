<?php

namespace App\Services;

class FormCheck{

    public static function checkGender($data){

        $gender = '';

        if($data === 0){
            $gender = '男性';
        }

        if($data === 1){
            $gender = '女性';
        }

        return $gender;
    }
}