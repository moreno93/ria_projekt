@extends('layouts.app')

@section('header')
    <h3>Home page</h3>
@endsection
@section('content')
	<div class="col-md-8 col-md-offset-2">
		@foreach($auditions as $audition)
			<div class="row">
				<div class="col-md-12">
					<div class="media">
							<div class="media-left">
							    @if( $audition->agency->agency_pic != '')
			                        <img class="mini-img" src="{{ asset($audition->agency->agency_pic) }}" alt="">
			                    @else
			                        <img class="mini-img" src="{{ asset('images/agency_pic/default.jpg') }}" alt="">         
			                    @endif
							</div>
						<div class="media-body">
							<h4 class="media-heading"><a href="/auditions/{{ $audition->id }}">{{ $audition->audition_name }}</a> by <a href="/auditions/{{ $audition->agency->id }}">{{ $audition->agency->agency_name }}</a></h4>
							<p>{{ $audition->city }},{{ $audition->country }} - {{ date('F d, Y', strtotime($audition->created_at)) }}</p>
							<p>Budget: {{ $audition->budget }}</p>
							<p>{{ $audition->description }}</p>
					  	</div>
					</div>
					{!! $auditions->render() !!}
				</div>
			</div>
		</a>
		<hr>
		@endforeach
	</div>
		
@endsection

