<?php

namespace App\Services;

use Carbon\Carbon;

class UserAge{

    //ユーザーの誕生日から現在の年齢を計算する。
    public static function userAge($birthday){

        $birthday = Carbon::createFromDate($birthday);
        $now = Carbon::now();
        
        //ユーザーの誕生日と現在の日付の差分を求める
        $age = $birthday->diff($now);
        
        return $age;
    }
}