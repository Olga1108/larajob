@extends('layouts.app')

@section('content')

<div class="container mt-5">
	
	<div class="d-flex justify-content-between">
        <h4>Recommended jobs</h4>
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Salary
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index', ['salary' => 'salary_high_to_low'])}}">High to low</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['salary' => 'salary_low_to_high'])}}">Low to high</a></li>
            </ul>

            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Date
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index', ['date' => 'latest'])}}">Latest</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['date' => 'oldest'])}}">Oldest</a></li>
            </ul>

            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Job type
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'fulltime'])}}">Fulltime</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'parttime'])}}">Parttime</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'contract'])}}">Contract</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'casual'])}}">Casual</a></li>
            </ul>
        </div>
    </div>
    <div class="row mt-2 g-1">
        @foreach($jobs as $job)
        <div class="col-md-3">
            <div class="card p-2 {{$job->job_type}}">
                <div class="text-right"><small class="badge text-bg-info">{{$job->job_type}}</small></div>
                <div class="text-center mt-2 p-3">
                    @if($job->profile->profile_pic)
                        <img src="{{Storage::url($job->profile->profile_pic)}}" width="80" class="rounded-circle" alt="" />
                    @else
                        <img src="http://placehold.co/400" width="80" class="rounded-circle" alt="" />
                    @endif
                    <span class="d-block font-weight-bold">{{$job->title}}</span>
                    <hr><span>{{$job->profile->name}}</span>
                    <div class="d-flex flex-row align-items-center justify-content-center">
                        <small class="ml-1">{{$job->address}}</small>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <span>${{number_format($job->salary,2)}}</span>
                        <a href="{{route('job.show',[$job->slug])}}" class="btn btn-sm btn-dark">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<style>
    .Fulltime{
        background-color: green;
        color: #fff;
    }
    .Parttime{
        background-color: blue;
        color: #fff;
    }
    .Casual{
        background-color: red;
        color: #fff;
    }
    .Contract{
        background-color: purple;
        color: #fff;
    }
</style>
@endsection