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
    
    use RefreshDatabase;

    //フォロー機能のテスト
    public function testFollow(){

        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $user1->follow($user2->id);
        
        $this->assertSame(2, $user2->id);
    }

    //フォロー解除機能のテスト
    public function testUnfollow(){

        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $user1->follow($user2->id);
        $user1->unfollow($user2->id);

        
    }
}
