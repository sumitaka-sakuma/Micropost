<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\models\Micropost;
use App\models\Like;


class LikesController extends Controller
{
    
    public function store(Request $request, $micropostId){

        Like::create(
            array(
              'user_id' => Auth::user()->id,
              'micropost_id' => $micropostId
            )
        );
        
        $micropost = Micropost::findOrFail($micropostId);

        return redirect()->action('MicropostsController@index', $micropostId);

    }

    public function destroy($micropostId, $likeId){

    }

}
