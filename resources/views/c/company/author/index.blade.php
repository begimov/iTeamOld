@extends('c.template')

@section('title')
	Люди iTeam | 
@stop

@section('main')

    <section id="authors" class="content" >
		<div class="container">

			<!--br class="temp_correct"-->
			
			<div class="row">
				<div class="box">
				
					@include('c.company.author.loop')
				
				</div>
			</div>
			
		</div>
	</section>
	
@stop