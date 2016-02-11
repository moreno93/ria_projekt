@extends('layouts.app')
@section('content')

@section('header')
    <h3>Users that have applied to the audition</h3>
@endsection

	<div class="container">
	@foreach ($users as $user)
		<div class="media">
		  <div class="media-left">
		    <a href="#">
                @if( $user->profile_pic != '')
                    <img class="mini-profile" src="{{ asset($user->profile_pic) }}" alt="">
                @else
                    <img class="mini-profile" src="{{ asset('images/profile_pic/default.jpg') }}" alt="">         
                @endif
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading">{{ $user->name }} :: {{ $user->profession }}</h4>
		    About: {{ $user->about }}
		  </div>
		</div>
	@endforeach
	</div>
@endsection