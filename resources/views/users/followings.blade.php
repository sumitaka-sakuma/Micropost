@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-8">
      <div class="card">
        <div class="card-header">フォロー一覧</div>
          <div class="card-body">
            
            <table class="talbe" style="table-layout:fixed;">
              <tbody>
                @foreach($users->follows as $user)
                <tr>
                  <td><img src="{{ asset('storage/profiles/'.$user->profile_image) }}" style="width:100px; height:100px;"></td>
                  <td><a href="{{ route('users.show', ['id' => $user->id ]) }}">{{ $user->name }}</a></td>
                  <td>
                    @if (auth()->user()->isFollowed($user->id))
                      <div class="px-2">
                        <span class="px-1 bg-secondary text-light">フォローされています</span>
                      </div>
                    @endif
                  </td>
                @endforeach
                </tr>
              </tbody>
            </table>

         
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection