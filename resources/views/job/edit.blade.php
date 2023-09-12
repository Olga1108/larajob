@extends('layouts.admin.main')

@section('content')

<div class="container mt-5">
	<div class="row d-flex justify-content-center">
		<div class="col-md-8">
			<h1>Update a job</h1>
			@if(Session::has('success'))
				<div class="alert alert-success">{{Session::get('success')}}</div>
			@endif
			<form action="{{route('job.update', [$listing->id])}}" method="POST" enctype="multipart/form-data">@csrf
				@method('PUT')
				<div class="form-group">
					<label for="feature_image">Feature Image</label>
                    <input type="file" class="form-control" id="feature_image" name="feature_image">
					@if($errors->has('feature_image'))
						<span class="text-danger">{{$errors->first('feature_image')}}</span>
					@endif
                </div>
				<div class="form-group">
					<label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$listing->title}}">
					@if($errors->has('title'))
						<span class="text-danger">{{$errors->first('title')}}</span>
					@endif
                </div>
				<div class="form-group">
					<label for="description">Description</label>
                    <textarea class="form-control summernote" id="description" name="description">{{$listing->description}}</textarea>
					@if($errors->has('description'))
					<span class="text-danger">{{$errors->first('description')}}</span>
					@endif
                </div>
				<div class="form-group">
					<label for="roles">Roles and Responsibility</label>
                    <textarea class="form-control summernote" id="roles" name="roles">{{$listing->roles}}</textarea>
					@if($errors->has('roles'))
					<span class="text-danger">{{$errors->first('roles')}}</span>
					@endif
                </div>
				<div class="form-group">
					<label for="title">Job types</label>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="job_type" id="fulltime" value="Fulltime"
						{{$listing->job_type === 'Fulltime' ? 'checked' : '' }}>
						<label class="form-check-label" for="fulltime">Fulltime</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="job_type" id="parttime" value="Parttime"
							{{$listing->job_type === 'Parttime' ? 'checked' : '' }}>
						<label class="form-check-label" for="parttime">Part time</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="job_type" id="casual" value="Casual"
							{{$listing->job_type === 'Casual' ? 'checked' : '' }}>
						<label class="form-check-label" for="casual">Casual</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="job_type" id="contract" value="Contract"
							{{$listing->job_type === 'Contract' ? 'checked' : '' }}>
						<label class="form-check-label" for="contract">Contract</label>
					</div>
					@if($errors->has('job_type'))
					<span class="text-danger">{{$errors->first('job_type')}}</span>
					@endif
                </div>
				<div class="form-group">
					<label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$listing->address}}">
					@if($errors->has('address'))
					<span class="text-danger">{{$errors->first('address')}}</span>
					@endif
                </div>
				<div class="form-group">
					<label for="salary">Salary</label>
                    <input type="text" class="form-control" id="salary" name="salary" value="{{$listing->salary}}">
					@if($errors->has('salary'))
					<span class="text-danger">{{$errors->first('salary')}}</span>
					@endif
                </div>
				<div class="form-group">
					<label for="datepicker">Application closing date</label>
                    <input type="text" class="form-control" id="datepicker" name="date" value="{{$listing->application_close_date}}">
					@if($errors->has('date'))
					<span class="text-danger">{{$errors->first('date')}}</span>
					@endif
                </div>
				<div class="form-group mt-4">
					<button type="submit" class="btn btn-success">Update a job</button>
                </div>
			</form>
		</div>
	</div>
</div>
<style>
	.note-insert {
		display: none!important;
	}
</style>
@endsection