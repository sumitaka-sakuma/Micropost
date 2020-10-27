<?php

namespace App\Services;

class FormCheck{

    //0,1をそれぞれ男性、女性に変換するメソッド
    public static function checkGender($gender){

        if($gender === 0){
            $gender = '男性';

        }else if($gender === 1){
            $gender = '女性';

        }else{
            return;

        }

        return $gender;
    }
}