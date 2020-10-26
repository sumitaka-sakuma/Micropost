<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Micropost;
use App\Models\Follower;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MicropostTest extends TestCase
{

    use RefreshDatabase;

    //投稿機能のテスト
    public function testPostValidation(){
        
        $micropost = factory(Micropost::class)->create();
        
        $response = $this->withoutExceptionHandling()
                         ->actingAs($micropost->user)
                         ->get('microposts/create');
        
        $this->assertEquals('test', $micropost->content);

        $micropost->save();

        $micropost1 = Micropost::find($micropost->id);
        $this->assertEquals('test', $micropost1->content);

    }
}
