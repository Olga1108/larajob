@extends('layouts.app')

@section('content')

<div class="controller mt-5">
	<div class="row d-flex justify-content-around">
		<div class="col-md-4">
			<h1>Looking for a job?</h1>
			<h3>Please create an account</h3>
			<img src="{{asset('image/click-arrow.png')}}">
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Register</div>
				<form action="{{route('store.seeker')}}" method="post">@csrf
					<div class="card-body">
						<div class="form-group">
							<label for="">Full name</label>
							<input type="text" name="name" class="form-control">
							@if($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name')}}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email" class="form-control">
							@if($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email')}}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" name="password" class="form-control">
							@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password')}}</span>
							@endif
						</div>
						<br>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Register</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	@endsection