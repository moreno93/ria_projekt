@extends('layouts.app')

@section('header')
    <h3>Home page</h3>
@endsection
@section('content')
	<div class="col-md-12">
	    <ul class="nav nav-tabs">
	    	<li class="active"><a href="#home">Recent auditions</a></li>
	    	<li><a href="#menu1">Friends activity</a></li>
	    </ul>
	    <div class="tab-content">
	    <div id="home" class="tab-pane fade in active">
			<div class="media">
				  <div class="media-body">
				  @foreach($auditions as $audition)
				  		<a href="auditions/{{ $audition->id }}">
				    		<h2 class="media-heading">{{ $audition->audition_name }}</h2>
				    	</a>

				    Agency: <a href="agencies/{{ $audition->agency_id }}">
							  	<i>{{ $audition->agency->agency_name }}</i>
							</a>
				    <br>
				    Location: <i>{{ $audition->city }},{{ $audition->country }}</i>
				    <br><hr>
				    @endforeach
				  </div>
				</div>
				{!! $auditions->render() !!}
			</div>
			
	    <div id="menu1" class="tab-pane fade">
			<p>
				Audicije frendova
			</p>
	    </div>
	  </div>
	  <br>
  </div>
@endsection

@section('javascript')
	<script>
		$(document).ready(function(){
		    $(".nav-tabs a").click(function(){
		        $(this).tab('show');
		    });
		    $('.nav-tabs a').on('shown.bs.tab', function(event){
		        var x = $(event.target).text();         // active tab
		        var y = $(event.relatedTarget).text();  // previous tab
		        $(".act span").text(x);
		        $(".prev span").text(y);
		    });
		});
	</script>
@endsection
