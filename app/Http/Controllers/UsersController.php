<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\UsersProfileEdit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UsersController extends Controller
{       

    public function index(){

        $current_user_id = Auth::id();

        $users = DB::table('users')
                   ->select('id', 'name', 'created_at')
                   ->where('id', '<', $current_user_id)
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

        //誕生日を年、月、日に分割する。
        $user_birthday= explode('-', $user->birthday);
        
        return view('users.edit', compact('user','user_birthday'));
    }

    public function update(UsersProfileEdit $request, $id){

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->gender = $request->input('gender');
        $user->self_introduction = $request->input('self_introduction');

        //年、月、日に分割された誕生日を連結する。
        $user->birthday = $user->birthday[0].'-'.$user->birthday[1].'-'.$user->birthday[2];
        $profileImage = $request->file('profile_image');
        
        //画像のリサイズ、保存の処理を呼び出す。
        $user->profile_image = $this->saveProfileImage($profileImage, $id);
       
        $user->save();

        return redirect('users/index');
    }

    public function destroy($id){

        $user = User::find($id);

        $user->delete();

        return redirect('users/index');
    }

    //画像のリサイズ、保存の処理
    private function saveProfileImage($profileImage, $id){

        $img = Image::make($profileImage);
        
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
