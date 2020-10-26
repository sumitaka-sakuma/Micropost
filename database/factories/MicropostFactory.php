<?php

use App\Models\User;
use App\Models\Micropost;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Micropost::class, function ($faker) {
    return [
        'content' => 'test',
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});

