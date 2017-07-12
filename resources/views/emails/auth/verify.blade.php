@extends('emails.auth.template')

@section('content')
		
		<p>
			{!! $intro . link_to('auth/confirm/' . $confirmation_code, $link) !!}
		</p>
@stop