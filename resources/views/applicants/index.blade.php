@extends('layouts.admin.main')

@section('content')

<div class="container mt-5">
	<div class="row d-flex justify-content-center">
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-table me-1"></i>
				Your jobs
			</div>
			<div class="card-body">
				<table id="datatablesSimple">
					<thead>
						<tr>
							<th>Title</th>
							<th>Created on</th>
							<th>Total applicants</th>
							<th>View job</th>
							<th>View applicants</th>
						</tr>
					</thead>
					<tbody>
						@foreach($listings as $listing)
						<tr>
							<td>{{$listing->title}}</td>
							<td>{{$listing->created_at->format('Y-m-d')}}</td>
							<td>{{$listing->users_count}}</td>
							<td><a href="#">View</a></td>
							<td><a href="{{route('applicants.show', $listing->slug)}}">View</a></td>
						</tr>	
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

{{-- <div class="container mt-5">
	<div class="row d-flex justify-content-center">

		@foreach ($listings as $listing) 

           {{$listing->title}} | {{$listing->users_count}}<br><br>
            @foreach ($listing->users()->get() as $applicant) 
                {{$applicant->name}}<br>
                {{$applicant->email}}<br>
            @endforeach
		@endforeach

	</div>
</div> --}}
@endsection