<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\models\Micropost;
use App\models\Like;


class LikesController extends Controller
{
    
    //投稿にいいねをつける
    public function store(Request $request, $micropostId){

        Like::create(
            array(
              'user_id' => Auth::user()->id,
              'micropost_id' => $micropostId
            )
        );
        
        $micropost = Micropost::findOrFail($micropostId);

        return redirect()->action('MicropostsController@index', $micropostId);

    }

    //いいねを解除
    public function destroy($micropostId, $likeId){

        $micropost = Micropost::findOrFail($micropostId);

        //likeテーブルの中から現在ログインしているuser_idを取得する
        $micropost->like_by()->findOrFail($likeId)->delete();

        return redirect()->action('MicropostController@index', $micropostId);
    }

}
