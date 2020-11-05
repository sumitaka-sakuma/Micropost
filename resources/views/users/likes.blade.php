@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-8">
      <div class="card">
        <div class="card-header">いいね一覧</div>
          <div class="card-body">

            <table class="talbe" width="100%" style="table-layout:fixed;">
              <tbody>
                @foreach($like_users as $like_user)
                <tr>
                  <td style="width:15%"><img src="{{ asset('storage/profiles/'.$like_user->user->profile_image) }}" style="width:100px; height:100px;"></td>
                  <td style="width:15%"><a href="{{ route('users.show', ['id' => $like_user->user->id ]) }}">{{ $like_user->user->name }}</a></td>
                  <td style="width:15%">{{ $like_user->micropost->content }}</td>
                @endforeach
                </tr>
              </tbody>
            </table> 
         
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection