@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Hi {{ $user->first_name }}!</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create', $user->id) }}">{{ trans('messages.task.Table') }}</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>{{ trans('messages.task.Title') }}</th>
            <th>{{ trans('messages.task.Content') }}</th>
            <th>{{ trans('messages.task.created') }}</th>
            <th width="280px">{{ trans('messages.user.Action') }}</th>
        </tr>
        @foreach($user->tasks as $task)
        <tr>
            <td>{{ $task->task_title }}</td>
            <td>{{ $task->task_content }}</td>
            <td>{{ dateToDMY($task->created_at) }}</td>
            <td>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('tasks.show', $task->id) }}">{{ trans('messages.user.Show') }}</a>
    
                    <a class="btn btn-primary" href="{{ route('tasks.edit', $task->id) }}">{{ trans('messages.user.Edit') }}</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">{{ trans('messages.user.Delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection
