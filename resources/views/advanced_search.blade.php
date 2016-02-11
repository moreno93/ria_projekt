@extends('layouts.app')

@section('header')
    <h3>Advanced Audition Search</h3>
@endsection

@section('content')
<div class="container">
    <ul class="nav nav-tabs">
    	<li class="active"><a href="#home">Search by location</a></li>
    	<li><a href="#menu1">Search by salary</a></li>
    </ul>

    <div class="tab-content">

    <div id="home" class="tab-pane fade in active">
		<form method="GET" action="/search/location">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				<input type="text" class="form-control" placeholder="Enter location..." name="query">
				<span class="input-group-btn">
			        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			    </span>
            </div>
        </form>
    </div>

    <div id="menu1" class="tab-pane fade">
		<form method="GET" action="/search/salary">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-eur"></i></span>
				<input type="number" class="form-control" placeholder="Salary larger than..." name="query">
				<span class="input-group-btn">
			        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			    </span>
            </div>
        </form>
    </div>

  </div>
</div>
<br>

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