@extends('layouts.app')

@section('content')

	<div class="container mt-5">
		<div class="row mt-5"> 
			<div class="col-md-8"> 
				<h3>Applied Jobs</h3> 
				@foreach ($users as $user)
					@foreach ($listings as $listing)
					<div class="card mb-3"> 
						<div class="card-body"> 
							<h5 class="card-title">{{$listing->title}}</h5> 
							<p class="card-text">Applied: {{$listing->pivot->created_at}}</p> 
							<p class="card-text">Salary: ${{number_format($listing->salary)}} per month</p> 
							<a href="{{route('job.show', [$job->slug])}}" class="btn btn-dark">View</a> 
						</div> 
					</div> 
					@endforeach 
				@endforeach      
			</div> 
		</div> 
	</div> 

@endsection