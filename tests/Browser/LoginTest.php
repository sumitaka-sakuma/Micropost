<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{

    use RefreshDatabase;
    private $user = null;

    protected function setUp(): void{
    
        parent::setUp();
        $this->user = User::create([
                    'name' => 'testuser',
                    'email' => 'testuser@gmail.com',
                    'password' => 'testpassword',
        ]);
    }
    
    //ログイン後のブラウザテスト
    public function testLogin(){

        $this->browse(function (Browser $browser) use($user) {
            
            $browser->visit('/login')
                    ->type('email', $this->user->email)
                    ->type('password', $this->user->password)
                    ->press('ログイン')
                    ->assertPathIs('microposts/index')
                    ->assertSee("投稿一覧");
        });
    }

    //ログアウト後のブラウザテスト
    public function testLogout(){

        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) {
            $browser->loginAs($user->id)
                    ->visit('/logout')
                    ->click('#navbarDropdown')
                    ->assertSee("Micropost");
        });
    }
}
