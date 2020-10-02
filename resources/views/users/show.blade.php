@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-8">
      <div class="card">
        <div class="card-header">ユーザー詳細</div>
        <br>
        
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
              </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td><a href="{{ route('users.edit', ['id' => $user->id ]) }}">編集</a></td>
            </tr>
          </tdoby>
        </table>  
        </div>
      </div>
    </div>
  </div>
</div>
@endsection