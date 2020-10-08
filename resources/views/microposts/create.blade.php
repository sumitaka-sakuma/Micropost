@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('投稿') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('microposts.store') }}">
                        @csrf

                        @if ($errors->any())
                          <div class="alert alert-danger">
                            <ul>
                            @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                          </div>
                        @endif

                        <div class="form-group row">
                          <label for="micropost" class="col-form-label text-md-center">投稿</label>
                          <div class="col-md-6">
                            <textarea class="form-control" name="content"></textarea>
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