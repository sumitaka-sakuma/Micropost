@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-3">
      <div class="card">
        <div class="card-header">検索</div>
        <div class="card-body">
          <form method="GET" action="{{ route('microposts.index')}}">
          @csrf
            <input class="form-controll mr-sm-2" name="search" type="search" placeholder="投稿を検索" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
          </form>
        </div>
      </div>
    </div>
    <div class="column col-md-9">
      <div class="card">
        <div class="card-header">投稿一覧</div>
          <div class="card-body">
            
            <table class="talbe" width="100%" style="table-layout:fixed;">
              <tbody>
                @foreach($microposts as $micropost)
                <tr>
                  <td style="width:15%;"><img src="{{ asset('storage/profiles/'.$micropost->profile_image) }}" style="width:100px; height:100px;"></td>
                  <td style="width:20%;"><a href="{{ route('users.show', ['id' => $micropost->id ]) }}">{{ $micropost->name }}</a></td>
                  <td style="width:30%;">
                    {{ $micropost->content }}
                  </td>
                  <td style="width20%">
                    <form method=GET action="{{ route('microposts.show', ['id' => $micropost->id])}}">
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

          {{ $microposts->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection