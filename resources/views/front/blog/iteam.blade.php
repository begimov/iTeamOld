@extends('front.iteam')

@section('title')
	{{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
	|
@stop

@section('main')

    <div class="row">

		@if($crumbs && Request::segment(1))
            <div class="row">


				<div id="crumb">
					<nav id="crumbs">
					@foreach($crumbs as $crumb)
						{!! link_to(@$crumb->path . @$crumb->wid, @$crumb->title, ["class"=>"crumb_parent crumb_" . (isset($i) ? ++$i : $i=0) ]) !!} <span class="crumb_separator">→</span>
					@endforeach
					</nav>
				</div>
            </div>
        @endif

		@if(Request::segment(1))
		<div class="box">
			<div class="col-lg-12 text-center">
				<h2>
				{!! $page->title !!}
				</h2>
			</div>
			<div class="col-lg-12">
				<p>{!! $page->text !!}</p>
			</div>
		</div>
        @endif

		@if($childrens)
		<div class="row media_list">
			@if(Request::segment(1) === 'news')
				@foreach($childrens as $child)
				<div class="box list_item">
					<div class="list_item_body">
						<div class="list_item_preinfo">
							<div class="list_item_date"><i class="material-icons"></i> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($child->created_at)) }}</time></div>
						</div>
						<h4 class="list_item_title">
						{!! link_to($child->path . $child->wid, $child->title) !!}
						</h4>
						<div class="list_item_text">
							<div class="intro">{!! @$child->intro !!}</div>
						</div>
					</div>
				</div>
				@endforeach
			@else
				@foreach($childrens as $child)
					@if($child->active == 1)
						<div class="box list_item">

							<div class="list_item_img" style="display:none;">
							</div>
							<div class="list_item_body">

								@if(@$child->author)
								<div class="list_item_preinfo">
									<div class="list_item_author"><i class="material-icons"></i> &nbsp; {!! $child->author !!}</div>
								</div>
								@endif

								<h4 class="list_item_title">
								{!! link_to($child->path . $child->wid, $child->title) !!}
								</h4>
								<div class="list_item_text">
									<div class="intro">{!! @$child->intro !!}</div>
								</div>
								<div class="list_item_info">
									<div class="list_item_date"><i class="material-icons"></i> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($child->created_at)) }}</time></div>
									<div class="list_item_viewed"><i class="material-icons"></i> &nbsp; {!! @$child->seen !!}</div>
								</div>
							</div>
						</div>
					@endif
				@endforeach
			@endif
			</div>
			{!! $childrens->links() !!}
        @endif


    </div>

@stop