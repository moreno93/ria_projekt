@extends('layouts.app')

@section('content')
	<div class="container">
		<center>
			<div class="alert alert-danger">
	  			<strong>Error!</strong> You already have an agency page.
			</div>
			<br/>
				<a href="/">
					<button type="button" class="btn btn-primary">
		                <i class="fa fa-btn"></i>Return to Home
		            </button>
				</a>
		</center>
	</div>
@endsection

