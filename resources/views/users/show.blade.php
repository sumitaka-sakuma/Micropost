@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-10">
      <div class="card">
        <div class="card-header">{{ $user->name }}のプロフィール</div>
          <div class="card-body">
        
          <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="プロフィール画像" style="width:100px; height:100px;">

          @if(auth()->user()->isFollowed($user->id))
            <div>
              <span class="px-1 bg-secondary text-light">フォローされています</span>
            </div>
          @endif
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
          @else
            <form method="POST" action="{{ route('follow', ['id' => $user->id ])}}">
              @csrf
              <div class="form-group">
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">フォローする</button>
                </div>
              </div>
            </form>
          @endif

          <table class="table">
            <thead>
              <tr>
                <th scope="col">ユーザー名</th>   
                <th scope="col">生年月日</th>
                <th scope="col">年齢</th>
                <th scope="col">性別</th>
                <th scope="col">自己紹介</th>   
             </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->birthday }}</td>
                @if(empty($user->birthday))
                  <td></td>
                @else
                  <td>{{ $age->y }}歳</td>
                @endif
                <td>{{ $gender}}</td>
                <td>{{ $user->self_introduction }}</td>
              </tr>
            </tdoby>
          </table>  

          @if(Auth::id() === $user->id)
            <div class="btn-toolbar">
              <div class="btn-group">
                <form method="GET" action="{{ route('users.edit', ['id' => $user->id ])}}">
                  @csrf
                  <div class="form-group">
                    <div class="text-right">
                      <input class="btn btn-info " type="submit" value="編集"> 
                    </div>
                  </div>
                </form>

                <form method="GET" action="{{ route('microposts.create', ['id' => $user->id ])}}">
                  @csrf
                  <div class="form-group">
                    <div class="text-right">
                      <input class="btn btn-secondary " type="submit" value="投稿"> 
                    </div>
                  </div>
                </form>
              </div>
            </div>
          @endif

          <label>これまで{{ $microposts->count() }}件投稿しています。</label>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">投稿一覧</th> 
                <th scope="col"></th> 
                <th scope="col"></th>
                <th scope="col"></th>  
              </tr>
            </thead>
            <tbody>
              @foreach($microposts as $micropost)
                <tr>
                  <td>{{ $micropost->content}}</td>
                  <td>{{ $micropost->created_at}}</td>
                  @if(Auth::id() === $user->id)
                    <td>
                      <form method="GET" action="{{ route('microposts.edit', ['id' => $micropost->id ])}}">
                        @csrf
                        <div class="form-group">
                          <div class="text-right">
                            <input class="btn btn-info" type="submit" value="編集"> 
                          </div>
                        </div>
                      </form>
                    </td>
                    <td>
                      <form method="POST" action="{{ route('microposts.destroy', ['id' => $micropost->id ])}}" id="delete_{{ $micropost->id }}">
                      @csrf
                        <div class="form-group">
                          <div class="text-right">
                            <input class="btn btn-danger " type="submit" value="削除"> 
                          </div>
                        </div>
                      </form>
                    </td>
                  @endif
              @endforeach
              </tr>
            </tdoby>
          </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<script>
function deletePost(e){
    'use strict'
    if(confirm('本当に削除してもよろしいですか？')){
        document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>