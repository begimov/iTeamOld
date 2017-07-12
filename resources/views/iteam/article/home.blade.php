@extends('iteam.template_no_fb')

@section('title')
	{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}
@stop

@section('main')

    <div class="row">
		
		<div class="article col-lg-12">

			@if($childrens)
			<div class="media_list" style="margin-top:30px;">
				@foreach($childrens as $child)
					<div class="box list_item">
						<div class="list_item_img" style="display:none;">	
						</div>
						<div class="list_item_body">
							
							@if(@$child->author)
							<div class="list_item_preinfo">
								<div class="list_item_author"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; {!! $child->author !!}</div>
								@if(@$child->parent->title && $current_path!==$child->path)
									<div class="list_item_parent"><a href="{!! $child->path !!}"><i class="glyphicon glyphicon-lamp" rel=">&#xE90F;"></i> &nbsp; {!! $child->parent->title !!}</a></div>
								@endif
							</div>
							@endif
							
							<h4 class="list_item_title">
							{!! link_to($child->path . $child->wid, $child->title) !!}
							</h4>
							<div class="list_item_text">
								<div class="intro">{!! @$child->intro !!}</div>
							</div>
							<div class="list_item_info">
								<div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($child->created_at)) }}</time></div>
								<div class="list_item_viewed"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp; {!! @$child->viewed !!}</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			{!! $childrens->links() !!}
			@endif
	
		</div>
		
		@if(@$outro)
		<div class="article col-lg-12"><div class="outro">{!! $outro !!}</div></div>
		@endif

    </div>

@stop