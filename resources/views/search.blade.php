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
			
			<ul class="media-list">
	            <li class="media">
	                <a class="pull-left" href="/profile/{{$user->id}}">
	                    @if($user->profile_pic != '')
	                        <img width="40" height="40" src="{{ asset($user->profile_pic) }}">
	                    @else
	                        <img width="40" height="40" src="{{ asset('images/profile_pic/default.jpg') }}">
	                    @endif
	                </a>
	                <div class="media-body">
	                    <div class="clearfix">
	                        <a href="/profile/{{$user->id}}" class="media-heading">{{$user->name}}</a>
	                    </div>
	                </div>
	            </li>
            </ul>
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

