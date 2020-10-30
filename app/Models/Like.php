<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Like extends Model
{

    protected $fillable = [
        'user_id',
        'micropost_id'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function micropost(){

        return $this->belongsTo(Micropost::class);
    }
}
