<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Micropost;
use App\Models\Follower;
use App\Models\Like;
use App\Http\LikesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikesControllerTest extends TestCase
{
    
    use RefreshDatabase;

}
