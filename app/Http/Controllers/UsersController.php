<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Micropost;
use App\Models\Follower;
use App\Services\UserAge;
use App\Services\FormCheck;
use App\Http\Requests\UsersProfileEdit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UsersController extends Controller
{       

    //ユーザー一覧
    public function index(Request $request){

        $search = $request->input('search');

        //検索フォーム
        $query = DB::table('users');
        
        //キーワードが空白出ない場合
        if(!$search == null){

            //全角スペースを半角に変換
            $search_split1 = mb_convert_kana($search, 's');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split1, -1, PREG_SPLIT_NO_EMPTY);

            foreach($search_split2 as $value){
                
                $query->where('name', 'like', '%'.$value.'%');
            }
        }

        $query->select('id', 'name', 'created_at', 'profile_image');
        $query->orderBy('created_at', 'desc');
        $users = $query->paginate(10);
        
        return view('users.index', compact('users', 'search'));
    }

    //プロフィール
    public function show($id){

        $user = User::find($id);

        $user_id = $user->id;
        
        $microposts = DB::table('microposts')
                       ->select('id', 'user_id', 'content', 'created_at', 'updated_at')
                       ->where('user_id', '=', $user_id)
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);

        //ユーザーの誕生日から年齢を求める
        $age = UserAge::userAge($user->birthday);

        //チェックボックスの値０、１をそれぞれ男性、女性に変換する。
        $gender = FormCheck::checkGender($user->gender);
        
        return view('users.show', compact('user', 'gender', 'age', 'microposts'));
    }

    //プロフィールの編集
    public function edit($id){

        $user = Auth::user();

        //誕生日を年、月、日に分割する。
        $user_birthday= explode('-', $user->birthday);

        return view('users.edit', compact('user','user_birthday'));
    }

    //プロフィールの更新
    public function update(UsersProfileEdit $request, $id){
               
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->gender = $request->input('gender');
        $user->self_introduction = $request->input('self_introduction');

        //年、月、日に分割された誕生日を連結する。
        $user->birthday = $user->birthday[0].'-'.$user->birthday[1].'-'.$user->birthday[2];

        $profileImage = $request->file('profile_image');
        
        //画像のリサイズ、保存の処理を呼び出す。
        if($profileImage != null){
            $user->profile_image = $this->saveProfileImage($profileImage, $id);
        }
       
        $user->save();
        
        return redirect('users/show/'.Auth::id());
    
    }

    //ユーザーの削除
    public function destroy($id){

        $user = User::find($id);

        if($user->delete()){
            return redirect('users/index');
        }else{
            return redirect('users/show/'.$id);
        }

    }

    //フォロー
    public function follow($id){

        $user = User::find($id);
        $follower = auth()->user();

        $is_following = $follower->isFollowing($user->id);

        //フォローしていなければフォローする
        if(!$is_following){

            $follower->follow($user->id);
            return back();
        }
    }

    //フォロー解除
    public function unfollow($id){

        $user = User::find($id);
        $follower = auth()->user();

        $is_following = $follower->isFollowing($user->id);

        if($is_following){

            $follower->unfollow($user->id);
            return back();
        }
    }

    //フォロー一覧
    public function followings($id){

        $users =  User::find($id);
        
        return view('users.followings', compact('users'));
    }

    //フォロワー一覧
    public function followers($id){

        $users = User::find($id);

        return view('users.followers', compact('users'));
    }

    //画像のリサイズ、保存の処理
    private function saveProfileImage($profileImage, $id){

        $img = \Image::make($profileImage);
        //リサイズ
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        
        //保存
        $file_name = 'profile_'.$id.'.'.$profileImage->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        
        //ファイル名を返す
        return $file_name;

    }
}
