@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ trans('messages.user.Table') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}">{{ trans('messages.user.create') }}</a>
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
            <th>{{ trans('messages.user.No') }}</th>
            <th>{{ trans('messages.user.Username') }}</th>
            <th>{{ trans('messages.user.Email') }}</th>
            <th width="280px">{{ trans('messages.user.Action') }}</th>
        </tr>
        
        <tr>
            <td>1</td>
            <td>nnmeii</td>
            <td>harumiaki3108@gmail.com</td>
            <td>
                <form action="{{ route('users.destroy',1) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('tasks.index') }}">{{ trans('messages.user.Show') }}</a>
    
                    <a class="btn btn-primary" href="{{ route('users.edit', 1) }}">{{ trans('messages.user.Edit') }}</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">{{ trans('messages.user.Delete') }}</button>
                </form>
            </td>
        </tr>
    </table>
  
      
@endsection
