<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Micropost;
use Illuminate\Support\Facades\Auth;

class MicropostsController extends Controller
{
    
    public function create(){

        return view('microposts.create');
    }
    
    
    public function store(Request $request){

        $micropost = new Micropost();
        
        $micropost->user_id = Auth::id();
        $micropost->content = $request->input('content');

        $micropost->save();

        return redirect('users/index');
    }

    public function destroy($id){

        $micropost = Micropost::find($id);

        $micropost->delete();

        return redirect('users/index');
    }
}
