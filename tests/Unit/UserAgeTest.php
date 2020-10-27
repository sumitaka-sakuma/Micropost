<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use App\Services\UserAge;

class UserAgeTest extends TestCase
{
    
    use RefreshDatabase;
     
    public function testUserAge(){
    
        $age1 = UserAge::userAge('1990-01-18');
        
        $this->assertTrue(is_int($age1->y));
    }
}
