@extends('layouts.app')

@section('header')
    <h3>Your Search Results</h3>
@endsection

@section('content')

	@if (isset($auditions))
		@foreach ($auditions as $audition)
			<h2>
				<a href="/auditions/{{ $audition->id }}">{{ $audition->audition_name }}</a>
			</h2>
			<h6>
				{{ $audition->description }}
			</h6>
			<hr />
		@endforeach
	@elseif (isset($users))
		@foreach ($users as $user)
			<h2>
				{{ $user->name }}
			</h2>
		@endforeach
	@elseif (isset($agencies))
		@foreach ($agencies as $agency)
			<h2>
				<a href="/agencies/{{ $agency->id }}">{{ $agency->agency_name }}</a>
			</h2>
			<h6>
				{{ $agency->description }}
			</h6>
			<hr />
		@endforeach
	@endif
@endsection

