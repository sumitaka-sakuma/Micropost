<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use App\Services\FormSearch;
use App\Models\User;
use App\Models\Micropost;
use Tests\TestCase;

class FormSerchTest extends TestCase
{
    
    use RefreshDatabase;

    /*ユーザーの検索機能
    *  ユーザー二つを作成し、eで検索して二つともヒットすることを確認
    */
    public function testSearchForUsers(){
    
        DB::table('users')->insert([
            ['name' => 'testuser', 'email' => 'testuser@gmail.com', 'password' => 'password'],
            ['name' => 'eric', 'email' => 'eric@gmail.com', 'password' => 'password']
        ]);
        
        $users = DB::table('users')->select('*')->where('name', 'testuser')->orWhere('name', 'eric')->get();
        
        $search = 'e';
        $query = DB::table('users');
            
        $query = FormSearch::searchForUsers($search, $query);
            
        $result = $query->select('*')->orderBy('created_at', 'desc')->get();
       
        $this->assertEquals($users[0], $result[0]);
        $this->assertEquals($users[1], $result[1]);
    }

    /* ユーザーの検索機能
    *  ユーザー二つを作成し、「あ」で検索。ユーザーがヒットしないことを確認
    */
    public function testSearchForUsersNotHits(){

        DB::table('users')->insert([
            ['name' => 'testuser', 'email' => 'testuser@gmail.com', 'password' => 'password'],
            ['name' => 'eric', 'email' => 'eric@gmail.com', 'password' => 'password']
        ]);
        
        $users = DB::table('users')->select('*')->where('name', 'testuser')->orWhere('name', 'eric')->get();
        
        $search = 'あ';
        $query = DB::table('users');
            
        $query = FormSearch::searchForUsers($search, $query);
            
        $result = $query->select('*')->orderBy('created_at', 'desc')->get();
        
        $this->assertEmpty($result);
    }
}
