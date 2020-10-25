<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ExampleTest extends TestCase
{
   
    use DatabaseTransactions;

    public function testBasicTest(){
    
        $response = $this->get('/');

        $response->assertStatus(200)
                 ->assertSee('Micropost'); 
    }
}
