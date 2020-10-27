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
        
        $this->assertTrue($user1->isFollowing($user2->id));
        $this->assertTrue($user2->isFollowed($user1->id));
        $this->assertSame($user2->id, $user1->follows[0]->id);
    }

    //フォロー解除機能のテスト
    public function testUnfollow(){

        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $user1->follow($user2->id);
        $user1->unfollow($user2->id);
        
        $this->assertFalse($user1->isFollowing($user2->id));
        $this->assertFalse($user2->isFollowed($user1->id));
        $this->assertNotSame($user2->id, $user1->follows);
    }

}
