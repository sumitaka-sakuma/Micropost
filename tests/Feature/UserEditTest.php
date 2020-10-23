<?php

namespace Tests\Feature;

use App\Models\User;
use App\Http\Requests\UsersProfileEdit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class UserEditTest extends TestCase
{

    use DatabaseTransactions;

    //プロフィール編集のバリデーションテスト
    // public function testUserEdit(){
        
    //     $user = factory(User::class)->create();
    //     $request = new UsersProfileEdit();
    //     $data = [];
        
    //     $data[0] = $this->actingAs($user)
    //                  ->get('users/edit/{$user->id}');
        
    //     $data[1] = $request->input('aa', 'name');
    //     $data[2] = $request->input("test", "self_introduction");
    //     $data[3] = $request->input("1998-11-22", "birthday");
               
    //     //dd($data[0]);
    //     $rules = $request->rules();
    //     $validator = Validator::make($data, $rules);
    //     $result = $validator->passes();

    //     //$data->save();
    //     //dd($rules);
    //     $this->assertTrue($result);
    //     $this->assertViewIs(route('users.show', ['id' => $users->id]));
        
    // }
}
