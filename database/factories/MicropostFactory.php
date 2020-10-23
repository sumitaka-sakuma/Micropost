<?php

use App\Models\User;
use App\Models\Micropost;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Micropost::class, function (Faker $faker) {
    return [
        'content' => $faker->content,
        
    ];
});
