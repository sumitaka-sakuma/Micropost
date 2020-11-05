@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-8">
      <div class="card">
        <div class="card-header">いいね一覧</div>
          <div class="card-body">

          @if($like_users->count() == 0)
            <p class="text-center">いいねをしていません。</p>
          @endif
            <p class="text-left">{{ $like_users->count() }}のいいねをしました。

            <table class="talbe" width="100%" style="table-layout:fixed;">
              <tbody>
                @foreach($like_users as $like_user)
                <tr>
                  <td style="width:15%"><img src="{{ asset('storage/profiles/'.$like_user->micropost->user->profile_image) }}" style="width:100px; height:100px;"></td>
                  <td style="width:20%"><a href="{{ route('users.show', ['id' => $like_user->micropost->user->id ]) }}">{{ $like_user->micropost->user->name }}</a></td>
                  <td style="width:50%">{{ $like_user->micropost->content }}</td>
                  <td style="width:15%">
                    <form method=GET action="{{ route('microposts.show', ['id' => $like_user->micropost->id])}}">
                    @csrf
                      <div class="form-group">
                        <div class="text-right">
                          <button type="submit" class="btn btn-success">詳細</button>
                        </div>
                      </div>
                    </form>
                  </td>
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