<?php

namespace App\Services;

class FormCheck{

    public static function checkGender($gender){

        if($gender === 0){
            $gender = '男性';
        }

        if($gender === 1){
            $gender = '女性';
        }

        return $gender;
    }
}