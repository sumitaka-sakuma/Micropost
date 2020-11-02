<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Micropost extends Model
{
    protected $fillable = [
        'content',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function likes(){

        return $this->hasMany(Like::class);
    }

    //likeテーブルの中から現在ログインしているuser_idを取得する
    public function like_by(){

        return Like::where('user_id', Auth::user()->id)->first();
    }

    //いいねしているかの判定
    public function isLike($micropostId){

        return $this->likes()->where('id', $micropostId)->exists();
    }
    
}
