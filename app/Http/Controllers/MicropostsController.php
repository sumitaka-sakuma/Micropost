<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Micropost;
use App\Models\Follower;
use App\Models\Like;
use App\Services\FormSearch;
use App\Http\Requests\ContentValidation;
use Illuminate\Support\Facades\Auth;

class MicropostsController extends Controller
{

    //投稿一覧
    public function index(Request $request){

        //検索フォームに入力した値を格納
        $search = $request->input('search');

        $micropost_id = Micropost::select('id')->get();
        
        //dd($micropost_id[2]->id);
        //検索フォーム
        $query = DB::table('microposts')
                   ->join('users', 'users.id', '=', 'microposts.user_id');   
        
        //キーワードが空白でない場合
        if(!$search == null){

            //投稿内容の検索
            $query = FormSearch::searchForMicroposts($search, $query);
        }

        $query->select('users.id', 'users.name', 'users.created_at', 'users.profile_image', 
                       'microposts.id', 'microposts.user_id', 'microposts.content');
        $query->orderBy('microposts.created_at', 'desc');

        $microposts = $query->paginate(10);
        //dd($microposts);
        return view('microposts.index', compact('microposts'));
    }

    //投稿の詳細
    public function show($id){
        
        $micropost = Micropost::findOrFail($id);

        $like = $micropost->likes()->where('user_id', Auth::user()->id)->first();
        
        return view('microposts.show')->with(array('micropost' => $micropost,
                                                  'like' => $like));
    }

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

        if(($id <= 0) || ($id == null)){
            return back();
        }

        $micropost = Micropost::find($id);

        return view('microposts.edit', compact('micropost'));
    }

    //投稿の更新
    public function update(ContentValidation $request, $id){

        if(($id <= 0) || ($id == null)){
            return back();
        }

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

        if(($id <= 0) || ($id == null)){
            return back();
        }

        $micropost = Micropost::find($id);

        if($micropost->delete()){
            return redirect('users/show/'.Auth::id());
        }else{
            return redirect('micropost/create');
        }
    }

}
