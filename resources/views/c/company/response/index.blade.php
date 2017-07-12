@extends('c.template')

@section('header')

    <!-- Header -->
    <header class="copage-header" id="top_{{ Request::segment(2) }}">
	
		<div class="-row">
			<ol class="breadcrumb">
				<li>{!! link_to('/company', 'Компания iTeam', ["class"=>"crumb_parent crumb_0"]) !!} </li>
			</ol>
		</div>
		
		<h1>Отзывы наших клиентов</h1>
		
        </div>
	
    </header>
	
@stop

@section('main')

    <section class="content">
		<div class="container">
			<div class="row">

				@if($responses)
				<div class="col-lg-10 col-lg-offset-1">
					
					@include('c.company.response.loop')
					
				</div>
			
				{!! $responses->links() !!}
				@endif

			</div>
		</div>
	</section>

@stop