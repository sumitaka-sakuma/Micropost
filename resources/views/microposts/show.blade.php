@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-10">
      <div class="card">
        <div class="card-header">投稿の詳細</div>
          <div class="card-body">
        
          <img src="{{ asset('storage/profiles/'.$micropost->user->profile_image) }}" alt="プロフィール画像" style="width:100px; height:100px;">

          {{ $micropost->user->name }}
          {{ $micropost->content }}
          @if($micropost->updated_at == null)
            {{ $micropost->created_at}}
          @else
            {{ $micropost->updated_at }}
          @endif

            @if (Auth::check())
              @if ($like)
                {{ Form::model($micropost, array('action' => array('LikesController@destroy', $micropost->id, $like->id))) }}
                  <div class="form-group">
                    <div class="text-right">
                      <button type="submit" class="btn btn-danger">いいねを外す</button>
                    </div>
                  </div>
                {!! Form::close() !!}
              @else
                {{ Form::model($micropost, array('action' => array('LikesController@store', $micropost->id))) }}
                  <div class="form-group">
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary">いいね</button>
                    </div>
                  </div>
                {!! Form::close() !!}
              @endif
            @endif
            
          <form method=GET action="{{ route('likes.index', ['id' => $micropost->id])}}">
          @csrf
            <div class="form-group">
              <div class="text-right">
                <button type="submit" class="btn btn-primary">いいねしたユーザーの一覧</button>
              </div>
            </div>
          </form>
        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection