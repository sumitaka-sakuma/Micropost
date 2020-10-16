<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Micropost;
use App\Models\Follower;
use App\Http\Requests\ContentValidation;
use Illuminate\Support\Facades\Auth;

class MicropostsController extends Controller
{

    //投稿一覧
    public function index(Request $request){

        $search = $request->input('search');
        
        //検索フォーム
        $query = DB::table('microposts')
                   ->join('users', 'users.id', '=', 'microposts.user_id');   
        
        //キーワードが空白でない場合
        if(!$search == null){

            //全角スペースを半角に変換
            $search_split1 = mb_convert_kana($search, 's');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split1, -1, PREG_SPLIT_NO_EMPTY);

            foreach($search_split2 as $value){
                
                $query->where('content', 'like', '%'.$value.'%');
            }
        }

        $query->select('users.id', 'users.name', 'users.created_at', 'users.profile_image', 'microposts.user_id', 'microposts.content');
        $query->orderBy('microposts.created_at', 'desc');

        $microposts = $query->paginate(10);

        return view('microposts.index', compact('microposts'));
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
