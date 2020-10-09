@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('投稿') }}</div>

                  <div class="card-body">

                    <form method="GET" action="{{ route('users.show', ['id' => $user->id ])}}">
                      @csrf
                      <div class="form-group">
                        <div class="text-left">
                          <input class="btn btn-info " type="submit" value="戻る"> 
                        </div>
                      </div>
                    </form>

                    <form method="POST" action="{{ route('microposts.store') }}">
                        @csrf

                        <div class="form-group row">
                          <div class="col-md-6">
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" style="width:450px; height:100px"></textarea>
                            
                            @error('content')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror

                          </div>
                        </div>
                        <br>

                        <div class="form-group">
                          <div class="text-right">
                            <input class="btn btn-info " type="submit" value="投稿する"> 
                          </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection