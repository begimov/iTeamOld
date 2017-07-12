@extends('site.template')

@section('header')

    <!-- Header -->
    <header class="copage-header" id="top_{{ Request::segment(2) }}">
	
		<div class="-row">
			<ol class="breadcrumb">
				<li>{!! link_to('/company', 'Компания iTeam', ["class"=>"crumb_parent crumb_0"]) !!} </li>
				<li>{!! link_to('/company/response', 'Отзывы о семинарах и мастер-классах', ["class"=>"crumb_parent crumb_1"]) !!} </li>
			</ol>
		</div>
		
		<h1>{{ $response->author->name }}</h1>
		
        </div>
	
    </header>
	
@stop

@section('main')

    <section class="content">
		<div class="container">
			<div class="row">

				<div class="col-lg-10 col-lg-offset-1">
					
					<ul class="chat">

						<li class="left clearfix">
							<span class="chat-img pull-left">
								@if($response->author->avatar)
								<img alt="" class="img-circle" src="{!! $response->author->avatar !!}" />
								@else
								<span class="glyphicon glyphicon-user img-circle" aria-hidden="true"></span>
								@endif
							</span>
							<div class="chat-body clearfix">
								<div class="chat-header">
									<strong class="primary-font">{!! $response->author->name !!}</strong>{!! $response->author->info ? ' <span class="text-info">' . $response->author->info . '</span>' : '' !!}{!! $response->company_info ? '  <span class="text-danger">' . $response->company_info . '</span>' : '' !!}
								</div>
								<div class="chat-text">
								{!! $response->text !!}
								</div>
							</div>
						</li>

					</ul>
					
				</div>


			</div>
		</div>
	</section>

@stop