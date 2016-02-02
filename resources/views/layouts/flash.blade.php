@if (Session::has('flash_message'))
	<div class="alert alert-success @if(Session::has('flash_message_important')) alert-important @endif">
		@if (Session::has('flash_message_important'))
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
			</button>
		@endif
			{{ session('flash_message') }}
		
	</div>
@endif