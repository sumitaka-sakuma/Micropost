@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-10">
      <div class="card">
        <div class="card-header">投稿の詳細</div>
          <div class="card-body">
        
          <img src="{{ asset('storage/profiles/'.$micropost->user->profile_image) }}" alt="プロフィール画像" style="width:100px; height:100px;">

          <table class="table" width="100%" style="table-layout:fixed;">
            <thead>
              <tr>
                <th scope="col">投稿</th>   
             </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $micropost->content }}</td>
                <td>
                  @if (Auth::check())
                    @if ($like)
                      {{ Form::model($micropost, array('action' => array('LikesController@destroy', $micropost->id, $like->id))) }}
                        <button type="submit">
                          <img src="/images/icon_heart_red.svg">
                          Like {{ $micropost->likes_count }}
                        </button>
                      {!! Form::close() !!}
                    @else
                      {{ Form::model($micropost, array('action' => array('LikesController@store', $micropost->id))) }}
                        <button type="submit">
                          <img src="/images/icon_heart.svg">
                          Like {{ $micropost->likes_count }}
                       </button>
                      {!! Form::close() !!}
                    @endif
                  @endif
                </td>
              </tr>
            </tdoby>
          </table>    

          <label>{{ $micropost->likes_count }}のいいねがついています。</label>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection