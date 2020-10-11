@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-10">
      <div class="card">
        <div class="card-header">プロフィール編集</div>
          <div class="card-body">
          
            <form method="POST" action="{{ route('users.update', ['id' => $user->id ])}}" enctype="multipart/form-data">
            @csrf

            <label for="profile_image">プロフィール画像</label>

            <label for="profile_image" class="btn">
              <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" id="img" style="width:100px; height:100px;">
              <input id="profile_image" type="file"  name="profile_image" onchange="previewImage(this);">
            </label>

            <div class="form-group row">
              <label for="user-name" class="col-form-label col-md-2 text-md-center">ユーザー名</label>
              <div class="col-md-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

              </div>
            </div>
            <br>

            <div class="form-group row">
              <label for="user-birthday" class="col-form-label col-md-2 text-md-center">生年月日</label>
              <div class="col-md-10">
                <div class="form-check form-check-inline">
                  {{ Form::selectRange('birthday[0]', 1900, 2020, $user->birthday[0], ['placeholder' => '年を入力してください']) }}
                  <label class="form-check-lable col-form-label">年</label>             
                </div>
                <div class="form-check form-check-inline">
                  {{ Form::selectRange('birthday[1]', 01, 12, $user->birthday[1], ['placeholder' => '月を入力してください']) }}
                  <label class="form-check-lable col-form-label">月</label>             
                </div>
                <div class="form-check form-check-inline">
                  {{ Form::selectRange('birthday[2]', 01, 31, $user->birthday[2], ['placeholder' => '日 を入力してください']) }}
                  <label class="form-check-lable col-form-label">日</label>             
                </div>
              </div>
            </div>
            <br>
          
            <div class="form-group">
              <label for="user-gender" class="col-form-label col-md-2 text-md-center">性別</label>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="gender" value="0" @if($user->gender === 0) checked @endif>
                <label class="form-check-lable col-form-label">男性</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="gender" value="1" @if($user->gender === 1) checked @endif>
                <label class="form-check-label col-form-label">女性</label>
              </div>
            </div>
            <br>

            <div class="form-group row">
              <label for="user-self_introduction" class="col-form-label col-md-2 text-md-center">自己紹介</label>
              <div class="col-md-10">
                <textarea class="form-control @error('self_introduction') is-invalid @enderror" name="self_introduction">{{ $user->self_introduction }}</textarea>

                @error('self_introduction')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

              </div>
            </div>
            <br>

            <div class="form-group">
              <div class="text-right">
                <input class="btn btn-info " type="submit" value="更新"> 
              </div>
            </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function previewImage(obj){
    var fileReader = new FileReader();
    fileReader.onload = (function() {
      document.getElementById('img').src = fileReader.result;
    });
    fileReader.readAsDataURL(obj.files[0]);
}
</script>

@endsection