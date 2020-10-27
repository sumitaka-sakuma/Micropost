<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Micropost;

class MicropostControllerTest extends TestCase
{
    
    use RefreshDatabase;

    //投稿の削除機能のテスト
    public function testMicropostDestroy(){
    
        //micropostのcontentとして「test」を作成
        $micropost = factory(Micropost::class)->create();
        
        $response = $this->withoutExceptionHandling()
                         ->actingAs($micropost->user)
                         ->post('microposts/destroy/'.$micropost->id);

        $this->assertDatabaseMissing('microposts', [
            'content' => 'test'
        ]);
    }
}
