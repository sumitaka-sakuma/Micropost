@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-10">
      <div class="card">
        <div class="card-header">{{ $user->name }}のプロフィール</div>
          <div class="card-body">
        
          <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="プロフィール画像" style="width:100px; height:100px;">

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
              </tr>
            </thead>
            <tbody>
              @foreach($microposts as $micropost)
                <tr>
                  <td>{{ $micropost->content}}</td>
                  <td>{{ $micropost->created_at}}</td>
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