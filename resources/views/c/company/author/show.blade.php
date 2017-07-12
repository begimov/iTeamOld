@extends('c.template')

@section('title')
	@if($author)
	{{ $author->name }} | 
	@endif
@stop

@section('main')

    <section id="author" class="content" >
		<div class="container">

			<!--br class="temp_correct"-->
			
			<div class="row">
				<div class="box">
				
					@include('c.company.author.card')
				
				</div>
			</div>
			
			@if($more)
				
				{!! $more !!}
			
			@endif
			
		</div>
	</section>
	
@stop