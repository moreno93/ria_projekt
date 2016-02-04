@extends('layouts.app')
@section('content')
	@foreach ($users as $user)
		<article>
			<h2>
				{{ $user->name }}
			</h2>
			<p>
				{{ $user->profession }}
			</p>
			<hr>
		</article>
	@endforeach
@endsection