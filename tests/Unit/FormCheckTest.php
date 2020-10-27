<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\FormCheck;
use Tests\TestCase;

class FormCheckTest extends TestCase
{
    
    use RefreshDatabase;

    //0,1がそれぞれ男性、女性に変換されるかのテスト
    public function testCheckGender(){

        $man = FormCheck::checkGender(0);
        $woman = FormCheck::checkGender(1);
    
        $this->assertSame('男性', $man);
        $this->assertSame('女性', $woman);
    }

    //0,1以外の値が入力された時のテスト
    public function testNotCheckGender(){

        // $notCheck1 = FormCheck::checkGender(2);
        // $notCheck2 = FormCheck::checkGender('test');

        
    }
}
