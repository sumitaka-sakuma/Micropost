@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-10">
      <div class="card">
        <div class="card-header">プロフィール編集</div>
          
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('users.update', ['id' => $user->id ])}}">
          @csrf

          <div class="form-group row">
            <label for="user-name" class="col-form-label col-md-2 text-md-center">ユーザー名</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
          </div>
          <br>

          <div class="form-group row">
            <label for="user-birthday" class="col-form-label col-md-2 text-md-center">生年月日</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="birthday" value="{{ $user->birthday }}">
            </div>
          </div>
          <br>
          
          <div class="form-group row">
            <label for="user-gender" class="col-form-label col-md-2 text-md-center">性別</label>
            <div class="col-md-5">
              <input type="radio" class="form-control" name="gender" value="0">男性
            </div>
            <div class="col-md-5">
              <input type="radio" class="form-control" name="gender" value="1">女性
            </div>
          </div>
          <br>

          <div class="form-group row">
            <label for="user-self_introduction" class="col-form-label col-md-2 text-md-center">自己紹介</label>
            <div class="col-md-10">
              <textarea class="form-control" name="self_introduction">{{ $user->self_introduction }}</textarea>
            </div>
          </div>
          <br>

          <div class="form-group">
            <div class="text-right">
              <input class="btn btn-info " type="submit" value="更新する"> 
            </div>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection