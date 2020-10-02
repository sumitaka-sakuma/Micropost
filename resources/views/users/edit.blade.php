@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-10">
      <div class="card">
        <div class="card-header">プロフィール編集</div>
          <form method="POST" action="{{ route('users.update', ['id' => $user->id ])}}">
          @csrf

          <div class="form-group">
            <label for="user-name" class="col-form-label text-md-right">ユーザー名</label>
            <div class="text-md-right">
              <input type="text" class="form-control" name="name" value="{{ $user->name }}">
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