<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        $users = 'name';

        return view('users.index', compact('users'));
    }

    public function show($id){

    }
}
