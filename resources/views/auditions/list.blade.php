@extends('layouts.app')
@section('content')
	@foreach ($auditions as $audition)
	<div class="col-md-12">
		<article>
			<h2>
				<a href="{{ url('/auditions', $audition->id) }}">{{ $audition->audition_name }}</a>
			</h2>
			<p>{{ date('F d, Y', strtotime($audition->created_at)) }} - {{ $audition->city }}, {{ $audition->country }}</p>
			<p>Budget: {{ $audition->budget }}</p>
			<p><big>{{ $audition->description }}</big></p>
		</article>
		<hr>
	</div>
	@endforeach
	<div class="form-group">
		<a href="{{ Request::header("referer") }}">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-danger">
					Back
				</button>
				<br>
			</div>
		</a>
	</div>
@endsection