<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Mocropost;
use Illuminate\Support\Facades\Auth;

class MicropostsController extends Controller
{
    
    public function create(){

        return view('microposts.create');
    }
    
    
    public function store(){

    }

    public function destroy($id){

    }
}
