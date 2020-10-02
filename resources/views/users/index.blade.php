@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-8">
      <div class="card">
        <div class="card-header">ユーザー一覧</div>
          <table class="talbe">
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
              @endforeach
              </tr>
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection