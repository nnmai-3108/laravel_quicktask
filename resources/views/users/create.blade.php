@extends('layouts.app')

@section('content')

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>{{ trans('messages.user.add') }}r</title>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>{{ trans('messages.user.add') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">{{ trans('messages.user.Back') }}</a>
                </div>
            </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ trans('messages.user.Username') }}:</strong>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        @error('username')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ trans('messages.user.Email') }}:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">{{ trans('messages.task.Submit') }}</button>
            </div>
        </form>
    </div>
</body>

</html>

@endsection
