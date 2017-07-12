@extends('front.iteam')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	| 
@stop

@section('main')

					
    <div class="row">
	
		<div class="promo">
			<div class="container">
				<a href="/news/customer-service_online-breakfast">
					<img alt="Онлайн завтрак iTeam" src="/images/content/customer-service_online.png">
				</a>
			</div>
		</div>
		
		@if($childrens)
		<div class="media_list">
			@foreach($childrens as $child)
			<div class="box list_item">

				<div class="list_item_img" style="display:none;">	
				</div>
				<div class="list_item_body">
					
					@if(@$child->author)
					<div class="list_item_preinfo">
						<div class="list_item_author"><i class="material-icons"></i> &nbsp; {!! $child->author !!}</div>
						@if(@$child->parent->title)
							<div class="list_item_parent"><a href="{!! $child->path !!}"><i class="material-icons">&#xE90F;</i> &nbsp; {!! $child->parent->title !!}</a></div>
						@endif
					</div>
					@endif
					
					<h4 class="list_item_title">
					{!! link_to($child->path . @$child->wid, $child->title) !!}
					</h4>
					<div class="list_item_text">
						<div class="intro">{!! @$child->intro !!}</div>
					</div>
					<div class="list_item_info">
						<div class="list_item_date"><i class="material-icons"></i> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($child->created_at)) }}</time></div>
						<div class="list_item_viewed"><i class="material-icons"></i> &nbsp; {!! @$child->viewed !!}</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		
        @endif

    </div>

@stop

@section('bottom')

	@if($news)
		
	<div id="promo_news">
		<div class="container">
			<div class="media_list">
				@foreach($news as $nw)
				<div class="box list_item">

					<div class="list_item_img" style="display:none;">	
					</div>
					<div class="list_item_body">
						
						<div class="list_item_preinfo">
							<div class="list_item_date"><i class="material-icons"></i> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($nw->created_at)) }}</time></div>
						</div>
						
						<h4 class="list_item_title">
						{!! link_to('news' . $nw->path . @$nw->wid, $nw->title) !!}
						</h4>
						<div class="list_item_text">
							<div class="intro">{!! @$nw->intro !!}</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>		
       
	@endif
	
@stop