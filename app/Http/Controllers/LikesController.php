<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use App\models\Micropost;
use App\models\Like;


class LikesController extends Controller
{
    
    //投稿の一覧
    public function index($micropostId){

        $micropost = Micropost::findOrFail($micropostId);
        
        $like_users = $micropost->likes()->where('micropost_id' , $micropost->id)->get();
         
        return view('microposts.likes', compact('like_users'));
    }

    //投稿にいいねをつける
    public function store(Request $request, $micropostId){

        Like::create(
            array(
              'user_id' => Auth::user()->id,
              'micropost_id' => $micropostId
            )
        );
        
        $micropost = Micropost::findOrFail($micropostId);

        return redirect()->action('MicropostsController@show', $micropostId);

    }

    //いいねを解除
    public function destroy($micropostId, $likeId){

        $micropost = Micropost::findOrFail($micropostId);

        //likeテーブルの中から現在ログインしているuser_idを取得する
        $micropost->like_by()->findOrFail($likeId)->delete();

        return redirect()->action('MicropostsController@show', $micropostId);
    }

}
