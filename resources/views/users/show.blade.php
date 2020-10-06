@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-10">
      <div class="card">
        <div class="card-header">ユーザー詳細</div>
          <div class="card-body">

          <form method="GET" action="{{ route('users.index')}}">
          @csrf
            <div class="form-group">
              <div class="text-left">
                <input class="btn btn-info " type="submit" value="戻る"> 
              </div>
            </div>
          </form>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">ユーザー名</th>   
                <th scope="col">生年月日</th>
                <th scope="col">性別</th>
                <th scope="col">自己紹介</th>   
             </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->birthday }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->self_introduction }}</td>
              </tr>
            </tdoby>
          </table>  

          <form method="GET" action="{{ route('users.edit', ['id' => $user->id ])}}">
            @csrf
            <div class="form-group">
              <div class="text-right">
                <input class="btn btn-info " type="submit" value="編集"> 
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