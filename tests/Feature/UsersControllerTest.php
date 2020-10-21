<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Micropost;
use App\Models\Follower;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample(){

        $user = factory(User::class)->create();

        
        
    }
}
