@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-8">
      <div class="card">
        <div class="card-header">プロフィール編集</div>
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
            </tr>
          </tdoby>
        </table>  
        </div>
      </div>
    </div>
  </div>
</div>
@endsection