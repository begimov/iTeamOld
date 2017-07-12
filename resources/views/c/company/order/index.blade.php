@extends('c.template')


@section('main')

    <section class="content">
		<div class="container">

			<br class="temp_correct">
			
			<div class="row">
				<div class="box box-orders">
				
					@include('c.p.menu')
				
					<div class="col-lg-10 col-sm-10">
					@if(@$orders && $orders->count())
						
						@foreach($orders AS $order)
						<div class="media{!! $order->status ? ($order->status>0 ? '' : ' bg-danger') : ' bg-warning' !!}">

							<div class="media-left media-middle">
								@if(isset($order->learn->img))
								  <img class="media-object" src="{!! $order->learn->img !!}" alt="{!! $order->learn->title !!}">
								@else
								<span class="media-object _48x48"></span>
								@endif
							</div>
						
							<div class="media-body">
								<h5 class="media-heading">
									@if(isset($order->learn->title))
									{!! $order->learn->title !!}
									<small class="label label-info">
									<a href="{!! '/learn' . $order->learn->path . $order->learn->wid !!}" class="text-black" target="_blank">
										<span class="glyphicon glyphicon-link" aria-hidden="true"></span>
										ссылка
									</a>
									</small>
									@else
									{!! $order->test->name !!}
									@endif
								</h5>
								<p class="status status{!! $order->status !!}" data-status="{!! $order->status !!}">

									<span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
									@if(isset($order->learn->price))
									<span class="nowrap">
										{!! $order->learn->price>0 ? HTML::priceFormatHtml(@$order->learn->price, $order->learn->currensy) : 'Бесплатно' !!}
									</span>
									@else
									<span class="nowrap">
										{!! $order->test->price>0 ? HTML::priceFormatHtml(@$order->test->price, $order->currensy) : 'Бесплатно' !!}
									</span>
									@endif

									<span class="label label-default">
										<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
										{!! HTML::paymentTypeText( $order->payment_type ) !!}
									</span>

									@if($order->payed_at && $order->status>0)
									<span class="label label-success">
										<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
										{!! HTML::orderStatusText($order->status) !!}
											{!! HTML::humanDateFormat( $order->payed_at ) !!}
									</span>
									@else
									<span class="label label-warning">
										<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
										{!! HTML::orderStatusText($order->status) !!}
											~ {!! HTML::humanDateFormat( $order->created_at, false) !!}
									</span>
									@endif
								</p>
							</div>
								
							<div class="media-right media-middle sm-hidden text-right">
							@if($order->status < 1)
								{{ link_to_route('orders.show', ($order->status?'Продолжить':'Подробнее'), [$order->id], ['class'=>'media-object btn']) }}
								{{ Form::open(['route' => ['orders.destroy', $order->id], 'class'=>'text-center']) }}
									{!! Form::hidden('_method', 'DELETE') !!}
									{!! Form::button('Удалить', ['class'=>'before-glyphicon glyphicon-trash trash text-danger size-xs btn-as-link link', 'type'=>'submit']) !!}
								{{ Form::close() }}
							@else
								{{ link_to_route('orders.show', 'Смотреть', [$order->id], ['class'=>'media-object btn']) }}
							@endif
							</div>
							
						</div>
						@endforeach
						
					@else
				
						<!--h3>Заказы</h3-->
						<p>Ничего не найдено</p>
						<p>Посетите наш <a class="link" href="/learn">Магазин знаний</a></p>
						
					@endif	
					
					</div>
				</div>
			</div>


		</div>
	</section>

@stop