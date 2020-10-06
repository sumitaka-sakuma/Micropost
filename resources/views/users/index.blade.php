@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-8">
      <div class="card">
        <div class="card-header">ユーザー一覧</div>
          <div class="card-body">
            <table class="talbe">
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td><a href="{{ route('users.show', ['id' => $user->id ]) }}">{{ $user->name }}</a></td>
                @endforeach
                </tr>
              </tbody>
            </table>

          {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection