@extends('site.template')

@section('header')

    <!-- Header -->
    <header class="copage-header" id="top_{{ Request::segment(3) }}">
	
		<div class="row">
			<ol class="breadcrumb">
				<li>{!! link_to('/company', 'Компания iTeam', ["class"=>"crumb_parent crumb_0"]) !!} </li>
			</ol>
		</div>
		
		<h1 class="text-center">Отзывы наших клиентов</h1>
	
    </header>
	
@stop

@section('main')

    <section class="content">
		<div class="container">
			<div class="row">

				@if($responses)
				<div class="col-lg-10 col-lg-offset-1">
					
					@include('site.company.response.loop')
					
				</div>
			
				{!! $responses->links() !!}
				@endif

			</div>
		</div>
	</section>

@stop