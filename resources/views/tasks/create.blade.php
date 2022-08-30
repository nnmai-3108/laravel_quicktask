@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ trans('messages.task.Add') }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.show', $user->id) }}">{{ trans('messages.user.Back') }}</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ trans('messages.user.whoops') }}</strong>{{ trans('messages.user.success') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('tasks.store', $user->id) }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ trans('messages.task.Title') }}:</strong>
                <input type="text" name="task_title" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ trans('messages.task.Content') }}:</strong>
                <textarea class="form-control" name="task_content" placeholder="Content"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" >{{ trans('messages.task.Submit') }}</button>
        </div>
    </div>
   
</form>
@endsection
