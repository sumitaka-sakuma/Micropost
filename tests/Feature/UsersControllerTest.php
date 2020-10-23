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
    
    use DatabaseTransactions;

    // public function testExample(){

    //     $user = factory(User::class)->create();

        
    //     $response = $this->actingAs($user)
    //                      ->get(route('users.show', ['id', $user->id]))
    //                      ->assertStatus(200);

    // }
}
