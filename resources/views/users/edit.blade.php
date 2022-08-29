@extends('layouts.app')

@section('content')
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>{{ trans('messages.task.Edit_user') }}</title>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ trans('messages.task.Edit_user') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.show', $user->id) }}" enctype="multipart/form-data">
                    {{ trans('messages.user.Back') }}
                    </a>
                </div>
            </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ trans('messages.user.Username') }}:</strong>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                            placeholder="Username">
                        @error('username')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ trans('messages.user.Email') }}:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email Address"
                            value="{{ $user->email }}">
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
