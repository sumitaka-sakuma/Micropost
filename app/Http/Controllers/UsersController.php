<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\UsersProfileEdit;

class UsersController extends Controller
{
    public function index(){

        $users = DB::table('users')
                   ->select('id', 'name', 'created_at')
                   ->orderBy('created_at', 'desc')
                   ->paginate(10);

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

    public function update(UsersProfileEdit $request, $id){

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->gender = $request->input('gender');
        $user->self_introduction = $request->input('self_introduction');

        $user->save();

        return redirect('users/index');
    }

    public function destroy($id){

        $user = User::find($id);

        $user->delete();

        return redirect('users/index');
    }
}
