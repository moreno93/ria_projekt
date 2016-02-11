@extends('layouts.app')
@section('content')
	@foreach ($auditions as $audition)
		<article>
			<h2>
				<a href="{{ url('/auditions', $audition->id) }}">{{ $audition->audition_name }}</a>
			</h2>
		</article>
	@endforeach
@endsection