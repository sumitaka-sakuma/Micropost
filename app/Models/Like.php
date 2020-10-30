<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Like extends Model
{

    use CounterCache;

    public $counterCacheOptions = [
        'Micropost' => [
            'field'      => 'likes_count',
            'foreignKey' => 'micropost_id'
        ]
    ];

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
