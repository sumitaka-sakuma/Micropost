<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    
    //ログイン後に投稿一覧画面に遷移するかのテスト
    public function testExample(){
    
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get(route('microposts.index'));

        $response->assertStatus(200)
                 ->assertViewIs('microposts.index');
    }
}

