@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-9">
      <div class="card">
        <div class="card-header">いいねした人の一覧</div>
          <div class="card-body">
            
            <p>{{ $like_users->count() }}個のいいねがついています。</p>
            <table class="talbe" width="100%" style="table-layout:fixed;">
              <tbody>
                @foreach($like_users as $like_user)
                <tr>
                  
                  <td style="width:20%;"><img src="{{ asset('storage/profiles/'.$like_user->user->profile_image) }}" style="width:100px; height:100px;"></td>
                  <td style="width:40%;"><a href="{{ route('users.show', ['id' => $like_user->user->id]) }}">{{ $like_user->user->name }}</a></td>
                  <td style="width:40%">
                    <div class="d-flex justify-content-end flex-grow-1">
                      @if(auth()->user()->isFollowing($like_user->user->id))
                        <form method="POST" action="{{ route('unfollow', ['id' => $like_user->user->id ])}}">
                        @csrf
                        {{ method_field('DELETE') }}
                        
                          <div class="form-group">
                            <div class="text-right">
                              <button type="submit" class="btn btn-danger">フォロー解除</button>
                            </div>
                          </div>
                        </form>
                      @endif
                      @if(!(auth()->user()->isFollowing($like_user->user->id)))
                        <form method="POST" action="{{ route('follow', ['id' => $like_user->user->id ])}}">
                        @csrf
                          <div class="form-group">
                            <div class="text-right">
                              <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                          </div>
                        </form>
                      @endif
                    </div>
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