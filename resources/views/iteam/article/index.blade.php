@extends('iteam.template_no_fb')

@section('title')
	{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}
@stop

@section('main')

    <div class="row">
		
		<div class="article col-lg-12">

			@if(@$crumbs)
			<div id="crumb">
				<nav id="crumbs">
				@foreach($crumbs as $crumb)
					{!! link_to($crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . ($crumb->deep-1) ]) !!} <span class="crumb_separator">&rarr;</span>
				@endforeach
				</nav>
			</div>
			@endif

			<div class="box">
					
				@if($page->show_all_children && !@$childrens)
				
				<h2 class="title">{{ @$page->title }}</h2>
				
				<div class="row" style="border-top:1px solid #eee;border-bottom:1px solid #eee;padding:4px 0;margin:8px 0;">
					<div class="fl oh col-lg-6 col-sm-6 text-left">
						<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
					</div>
					<div class="fr oh col-lg-6 col-sm-6 text-right">
					@if(@$page->author)
						<h4 class="author">{!! $page->author !!}</h4>
					@endif
					</div>
				</div>
				
					@if(@$outro)
					<div class="outro">{!! $outro !!}</div>
					@endif

				@else
					
				<h2 class="title">{!! $page->title !!}</h2>
				
				@endif
				
				<div>{!! $page->text !!}</div>
				
			</div>
			
			@if(!$page->show_all_children && @$page->childrens)
			<div class="media_list" style="margin-top:30px;">
				
				@if(@$categories)
					
					@foreach($categories as $category)
						<div class="box list_item list_category">

							<div class="list_item_img" style="display:none;">	
							</div>
							<div class="list_item_body">
								
								<h4 class="list_item_title">
								{!! link_to($category->path . $category->wid, $category->title) !!}
								</h4>
								<div class="list_item_text">
									<div class="intro">{!! @$category->intro !!}</div>
									
									@if(@$category->childrens)
										<ul>
										@foreach($category->childrens as $category_child)
											<li><h5>{!! link_to($category_child->path . $category_child->wid, $category_child->title) !!}</h5></li>
										@endforeach
										</ul>
									@endif
									
									
								</div>
								
							</div>
						</div>
					@endforeach
				
				@endif
				
				@if(@$posts)
					
					@foreach($posts as $post)
						<div class="box list_item">

							<div class="list_item_img" style="display:none;">	
							</div>
							<div class="list_item_body">
								
								@if(@$post->author)
								<div class="list_item_preinfo">
									<div class="list_item_author"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; {!! $post->author !!}</div>
									@if(@$post->parent->title && $current_path!==$post->path)
										<div class="list_item_parent"><a href="{!! $post->path !!}"><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> &nbsp; {!! $post->parent->title !!}</a></div>
									@endif
								</div>
								@endif
								
								<h4 class="list_item_title">
								{!! link_to($post->path . $post->wid, $post->title) !!}
								</h4>
								<div class="list_item_text">
									<div class="intro">{!! @$post->intro !!}</div>
								</div>
								<div class="list_item_info">
									<div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($post->created_at)) }}</time></div>
									<div class="list_item_viewed"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp; {!! @$post->viewed !!}</div>
								</div>
							</div>
						</div>
					@endforeach
				
				@endif
				
			</div>

			@endif
			
			@if($page->show_all_children && $childrens)
			<div class="media_list" style="margin-top:30px;">
		
				@include('iteam.article.loop')
				
			</div>
			{!! $childrens->links() !!}
			@endif
			
	
		</div>
		
		@if(@$outro)
		<div class="article col-lg-12"><div class="outro">{!! $outro !!}</div></div>
		@endif

    </div>

@stop

@section('edit-link')

	@if(Auth::user() && @Auth::user()->role_id<3)
		<div class="admin-edit"><a class="admin-edit-link" target="_blank" href="{{ route('admin.article.show',$page->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></div>
	@endif

@stop