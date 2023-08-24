@extends('layouts.app')

@section('content')

<div class="controller mt-5">
	<div class="row d-flex justify-content-center">
		{{ auth()->user()->name }}
		{{ auth()->user()->email }}
	</div>
</div>

@endsection