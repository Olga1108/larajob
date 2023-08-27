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
			<div class="card" id="card">
				<div class="card-header">Register</div>
				<form action="" method="post" id="registrationForm">
					<div class="card-body">
						<div class="form-group">
							<label for="">Full name</label>
							<input type="text" name="name" class="form-control" required>
							@if($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name')}}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email" class="form-control" required>
							@if($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email')}}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" name="password" class="form-control" required>
							@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password')}}</span>
							@endif
						</div>
						<br>
						<div class="form-group">
							<button class="btn btn-primary" id="btnRegister">Register</button>
						</div>
					</div>
				</form>
			</div>
			<div id="message"></div>
		</div>
	</div>
</div>
<script>
	var url = "{{route('store.seeker')}}";
	document.getElementById("btnRegister").addEventListener("click", function(event) {
	var form = document.getElementById("registrationForm");
	var card = document.getElementById("card");
	var messageElement = document.getElementById("message");
	messageElement.innerHTML = '';
	var formData = new FormData(form)

	var button = event.target
	button.disabled = true
	button.innerHTML = 'Sending email...'

	fetch(url, {
		method: "POST",
		headers: {
			'X-CSRF-TOKEN': '{{csrf_token()}}'
		},
		body: formData
	}).then(response => {
			if(response.ok) {
				return response.json();
			} else {
				throw new Error('Error')
			}
		}).then(data => {
			button.innerHTML = 'Register'
			button.disabled = false
			messageElement.innerHTML = '<div class="alert alert-success">Registration was successful. Please check your email to verify it</div>'
			card.style.display = 'none'
		}).catch(error => {
			button.innerHTML = 'Register'
			button.disabled = false
			messageElement.innerHTML = '<div class="alert alert-danger">Something went wrong. Please try again</div>'
		})
})
</script>

	@endsection