<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Storage;
use DatabaseMigrations;
use App\Models\User;
use Tests\TestCase;

class UserPathTest extends TestCase
{
    
    use RefreshDatabase,WithoutMiddleware;

    //users/indexのテスト
    public function testGetAllUsersPath(){
        
        $this->post('/login', [
            'email'    => 'John@gmail.com',
            'password' => '0125SSaa'
        ]);

        $response = $this->withoutMiddleware()
                         ->get(route('users.index'));

        $response->assertStatus(200);
    }

    //users/show/{$id}のテスト
    public function testGetUserPath(){

        $user = factory(User::class)->create();
        
        $response = $this->withoutExceptionHandling()
                         ->actingAs($user)
                         ->get('users/show/'.$user->id);

        $response->assertStatus(200);
    }

}
