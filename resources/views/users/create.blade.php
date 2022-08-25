@extends('layouts.app')

@section('content')

<div class="page-header"><h4>Quản lý User</h4></div>

<?php //Hiển thị thông báo thành công?>
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php //Form thêm mới user?>
<p><a class="btn btn-primary" href="{{ url('/users') }}">Về danh sách</a></p>
<div class="col-xs-4 col-xs-offset-4">
	<center><h4>Add user</h4></center>
	<form action="{{ url('/users/create') }}" method="post">
		<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
		<div class="form-group">
			<label for="username">username</label>
			<input type="text" class="form-control" id="username" name="username" placeholder="username" maxlength="255" required />
		</div>
		<div class="form-group">
			<label for="email">email</label>
			<input type="text" class="form-control" id="email"  name="email" placeholder="email" maxlength="15" required />
		</div>		
		<center><button type="submit" class="btn btn-primary">Thêm</button></center>
	</form>
</div>

@endsection
