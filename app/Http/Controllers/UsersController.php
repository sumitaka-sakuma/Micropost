<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show($id){

        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    public function edit($id){

        $user = User::find($id);
        //dd($user);
        return view('users.edit', compact('user'));
    }

    public function update(){

    }
}
