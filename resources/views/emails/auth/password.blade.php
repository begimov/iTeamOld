@extends('emails.auth.template')

@section('content')
		
		<p>
			{!! $intro . link_to('password/reset/' . $token, $link) !!}.<br>
			{{ $expire . config('auth.reminder.expire', 60) . $minutes}}
		</p>
@stop
