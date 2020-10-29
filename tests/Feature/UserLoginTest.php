<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserLoginTest extends TestCase
{
    
    use RefreshDatabase;

    //ログインした状態でリクエストが正しく処理されるか
    public function testLoggedIn(){
    
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/microposts/index');

        $response->assertStatus(200);
    }

}
