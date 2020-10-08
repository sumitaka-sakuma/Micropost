<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = [
        'content',
        'user_id'
    ];

}
