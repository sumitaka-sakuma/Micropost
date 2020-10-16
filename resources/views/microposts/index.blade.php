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
            <input class="form-controll mr-sm-2" name="search" type="search" placeholder="ユーザー名を検索" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
          </form>
        </div>
      </div>
    </div>
    <div class="column col-md-9">
      <div class="card">
        <div class="card-header">投稿一覧</div>
          <div class="card-body">
            @if(!empty($search))
              <label for="search">{{ $microposts->count() }}件ヒットしました</label>
            @endif
            <table class="talbe" width="100%" style="table-layout:fixed;">
              <tbody>
                @foreach($microposts as $micropost)
                <tr>
                  <td style="width:15%;"><img src="{{ asset('storage/profiles/'.$micropost->profile_image) }}" style="width:100px; height:100px;"></td>
                  <td style="width:20%;"><a href="{{ route('users.show', ['id' => $micropost->id ]) }}">{{ $micropost->name }}</a></td>
                  <td style="width:50%;">
                    {{ $micropost->content }}
                  </td>
                  
                @endforeach
                
                </tr>
              </tbody>
            </table>

          {{ $microposts->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection