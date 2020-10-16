@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-3">
      <div class="card">
        <div class="card-header">検索</div>
        <div class="card-body">
          <form method="GET" action="{{ route('users.index')}}">
          @csrf
            <input class="form-controll mr-sm-2" name="search" type="search" placeholder="ユーザー検索" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
          </form>
        </div>
      </div>
    </div>
    <div class="column col-md-9">
      <div class="card">
        <div class="card-header">ユーザー一覧</div>
          <div class="card-body">
            @if(!empty($search))
              <label for="search">{{ $users->count() }}件ヒットしました</label>
            @endif
            <table class="talbe" width="100%" style="table-layout:fixed;">
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td style="width:15%;"><img src="{{ asset('storage/profiles/'.$user->profile_image) }}" style="width:100px; height:100px;"></td>
                  <td style="width:60%;"><a href="{{ route('users.show', ['id' => $user->id ]) }}">{{ $user->name }}</a></td>
                  <td style="width:25%;">
                    <div class="d-flex justify-content-end flex-grow-1">
                      @if(auth()->user()->isFollowing($user->id))
                        <form method="POST" action="{{ route('unfollow', ['id' => $user->id ])}}">
                        @csrf
                        {{ method_field('DELETE') }}
                        
                          <div class="form-group">
                            <div class="text-right">
                              <button type="submit" class="btn btn-danger">フォロー解除</button>
                            </div>
                          </div>
                        </form>
                      @endif
                      @if(!(auth()->user()->isFollowing($user->id)))
                        <form method="POST" action="{{ route('follow', ['id' => $user->id ])}}">
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

          {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection