@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="column col-md-8">
      <div class="card">
        <div class="card-header">ユーザー詳細</div>
          {{$user}}
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection