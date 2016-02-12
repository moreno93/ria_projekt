@extends('layouts.app')
@section('content')
	@foreach ($auditions as $audition)
		<article>
			<h2>
				<a href="{{ url('/auditions', $audition->id) }}">{{ $audition->audition_name }}</a>
			</h2>
		</article>
	@endforeach
	<div class="form-group">
		<a href="{{ Request::header("referer") }}">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-danger">
					<i class="fa fa-btn fa-plus"></i>Back
				</button>
			</div>
		</a>
	</div>
@endsection