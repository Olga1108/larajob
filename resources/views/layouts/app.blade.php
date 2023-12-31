<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Job Portal</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
</head>

<body>
	<nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
		<div class="container">
			<a class="navbar-brand" href="/">TeckJobs</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ms-auto align-items-center">
					<a class="nav-link active" aria-current="page" href="/">Home</a>
					@if(Auth::check())

					<div class="dropdown">
						<a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							@if (auth()->user()->profile_pic)
								<img src="{{Storage::url(auth()->user()->profile_pic)}}" width="40" class="rounded-circle">
							@else
								<img src="https://placehold.co/400" width="40" class="rounded-circle">
							@endif
						</a>
						<ul class="dropdown-menu">
							@if (auth()->user()->user_type === 'seeker')
								<li><a class="nav-link active" aria-current="page" href="{{route('seeker.profile')}}">Profile</a></li>
								<li><a class="nav-link active" aria-current="page" href="{{route('job.applied')}}">Job applied</a></li>
								<li><a class="nav-link" id="logout" href="#">Logout</a></li>
							@else
								<li><a class="nav-link" href="{{route('dashboard')}}">Dashboard</a></li>
							@endif
						</ul>
					</div>

					@endif
					@if(!Auth::check())
					<a class="nav-link" href="{{route('login')}}">Login</a>
					<a class="nav-link" href="{{route('create.seeker')}}">Job Seeker</a>
					<a class="nav-link" href="{{route('create.employer')}}">Employer</a>
					@endif
					<form id="form-logout" action="{{route('logout')}}" method="post">@csrf</form>
				</div>
			</div>
		</div>
	</nav>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
	<script>
		let logout = document.getElementById('logout');
		let form = document.getElementById('form-logout');
		logout.addEventListener('click', function() {
			form.submit();
		})
	</script>
	@yield('content')
</body>

</html>