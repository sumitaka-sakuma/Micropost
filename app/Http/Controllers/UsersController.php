<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){

        $user = User::find($id);

        $user->name = $request->input('name');

        $user->save();

        return redirect('users/index');
    }

    public function destroy($id){

        $user = User::find($id);

        $user->delete();

        return redirect('users/index');
    }
}
