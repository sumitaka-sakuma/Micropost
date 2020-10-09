<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Micropost;
use App\Http\Requests\ContentValidation;
use Illuminate\Support\Facades\Auth;

class MicropostsController extends Controller
{

    public function create(){

        $user = User::find(Auth::id());

        return view('microposts.create', compact('user'));
    }
    
    
    public function store(ContentValidation $request){

        $micropost = new Micropost();
        
        $micropost->user_id = Auth::id();
        $micropost->content = $request->input('content');

        $micropost->save();

        return redirect('users/index');
    }
    
    public function edit($id){

        $micropost = Micropost::find($id);

        return view('microposts.edit', compact('micropost'));
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

        $micropost = Micropost::find($id);

        $micropost->delete();

        return redirect('users/index');
    }
}
