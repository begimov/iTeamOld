
	@if($errors->all())
		@foreach($errors->all() AS $errr)
			@include('partials/error', ['type' => 'danger', 'message' => $errr])
		@endforeach
	@endif
	
	@if(session()->has('status'))
					<div class="alert alert-success alert-dismissible growl-animated animated fadeInDown" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						{{ session('status') }}
					</div>
	@endif
	
	@if(session()->has('error'))
					<div data-growl="container" class="alert alert-danger alert-dismissible growl-animated animated fadeInDown" role="alert" data-growl-position="top-right">
						<button type="button" class="close" data-growl="dismiss" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						{{ session('error') }}
					</div>
	@endif