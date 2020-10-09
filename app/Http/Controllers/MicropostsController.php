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

    //新規投稿
    public function create(){

        $user = User::find(Auth::id());

        return view('microposts.create', compact('user'));
    }
    
    //投稿の保存
    public function store(ContentValidation $request){

        $micropost = new Micropost();
        
        $micropost->user_id = Auth::id();
        $micropost->content = $request->input('content');

        if($micropost->save()){
            return redirect('users/show/'.Auth::id());
        }else{
            return redirect('micropost/create');
        }
    }
    
    //投稿の編集
    public function edit($id){

        $micropost = Micropost::find($id);

        return view('microposts.edit', compact('micropost'));
    }

    //投稿の更新
    public function update(ContentValidation $request, $id){

        $micropost = Micropost::find($id);

        $micropost->content = $request->input('content');

        if($micropost->save()){
            return redirect('users/show/'.Auth::id());
        }else{
            return redirect('micropost/edit/'.$id);
        }
    }

    //投稿の削除
    public function destroy($id){

        $micropost = Micropost::find($id);

        if($micropost->delete()){
            return redirect('users/show/'.Auth::id());
        }else{
            return redirect('micropost/create');
        }
    }

}
