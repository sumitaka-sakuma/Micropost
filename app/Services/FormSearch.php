<?php

namespace App\Services;

use App\Models\User;
use App\Models\Micropost;

class FormSearch{

    //＄searchの値でユーザー名を検索
    public static function searchForUsers ($search, $query){

        //全角スペースを半角に変換
        $search_split1 = mb_convert_kana($search, 's');

        //空白で区切る
        $search_split2 = preg_split('/[\s]+/', $search_split1, -1, PREG_SPLIT_NO_EMPTY);

        foreach($search_split2 as $value){
            
            $query->where('name', 'like', '%'.$value.'%');
            
        }

        return $query;
    }

    //＄searchの値で投稿内容を検索
    public static function searchForMicroposts ($search, $query){

        //全角スペースを半角に変換
        $search_split1 = mb_convert_kana($search, 's');

        //空白で区切る
        $search_split2 = preg_split('/[\s]+/', $search_split1, -1, PREG_SPLIT_NO_EMPTY);

        foreach($search_split2 as $value){
            
            $query->where('content', 'like', '%'.$value.'%');
        }

        return $query;
    }
}