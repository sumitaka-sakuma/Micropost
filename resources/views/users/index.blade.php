@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-4">
      <div class="card">
        <div class="card-header">検索</div>
        <div class="card-body">
          <form method="GET" action="{{ route('users.index')}}">
          @csrf
            <input class="form-controll mr-sm-2" name="search" type="search" placeholder="ユーザー名を検索" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
          </form>
        </div>
      </div>
    </div>
    <div class="column col-md-8">
      <div class="card">
        <div class="card-header">ユーザー一覧</div>
          <div class="card-body">
            @if(!empty($search))
              <label for="search">{{ $users->count() }}件ヒットしました</label>
            @endif
            <table class="talbe" style="table-layout:fixed;">
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td><img src="{{ asset('storage/profiles/'.$user->profile_image) }}" style="width:100px; height:100px;"></td>
                  <td><a href="{{ route('users.show', ['id' => $user->id ]) }}">{{ $user->name }}</a></td>
                  <td>
                    @if (auth()->user()->isFollowed($user->id))
                      <div class="px-2">
                        <span class="px-1 bg-secondary text-light">フォローされています</span>
                      </div>
                    @endif
                  </td>
                  <td>
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