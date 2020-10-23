<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    
    use DatabaseTransactions;

    //ログイン後に投稿一覧画面に遷移するかのテスト
    public function testLinkToMicropostIndex(){
    
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get(route('microposts.index'));

        $response->assertStatus(200)
                 //->assertAuthenticatedAs($response)
                 ->assertViewIs('microposts.index');
    }

    //ログアウト後にホーム画面に遷移するかのテスト
    public function testAfterLogoutLinkTo(){

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user);

        $response = $this->post('logout');

        $response->assertGuest();
        //$response->assertStatus(200)
        //         ->assertViewIs('/');
    }
}

