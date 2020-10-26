<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UpdateMyprofileTest extends TestCase
{
    
    use RefreshDatabase;

    //マイプロフィールの更新のテスト
    public function testUpdateMyProfile(){
        
        $user = factory(User::class)->create();

        $response = $this->withoutExceptionHandling()
                         ->actingAs($user)
                         ->get('users/edit/'.$user->id);

        $this->post('/users/update/'.$user->id, [
            'name'    => 'testuser',
            'birthday' => ['1990', '11', '22'],
            'gender' => 1,
            'self_introduction' => 'Hello',
        ]);
        
        $this->assertEquals('testuser', $user->name);
        $this->assertEquals('1990-11-22', $user->birthday);
        $this->assertEquals(1, $user->gender);
        $this->assertEquals('Hello', $user->self_introduction);
        

        $user1 = User::find($user->id);
        $this->assertEquals('testuser', $user1->name);
        $this->assertEquals('1990-11-22', $user1->birthday);
        $this->assertEquals(1, $user1->gender);
        $this->assertEquals('Hello', $user1->self_introduction);
        
    }
}
