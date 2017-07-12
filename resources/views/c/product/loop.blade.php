@if($childrens)
				
			<br class="temp-correct">

			<div class="row media_list">
				<div class="col-lg-10 col-lg-offset-1">
					@foreach($childrens as $child)
					
					<div class="media">

						<div class="media-left media-middle">
							@if($child->img)
							<a href="{!! '/learn' . $child->path . $child->wid !!}">
							  <img class="media-object" src="{!! $child->img !!}" alt="{!! $child->title !!}">
							</a>
							@else
							<span class="media-object _64x64"></span>
							@endif
						</div>
						
						<div class="media-body">
							<h4 class="media-heading">{!! link_to('learn' . $child->path . $child->wid, $child->title) !!}</h4>
							<div class="intro">{!! @$child->intro !!}</div>
						</div>
						
						@if(!$child->children)
						<div class="media-right media-middle text-right">
							<span class="media-object">

								<span class="nowrap">
									{!! $child->price>0 ? HTML::priceFormatHtml(@$child->price, $child->currensy) : 'Бесплатно' !!}
								</span>
								
								@if($child->published_at > date('Y-m-d H:i:s'))
								<small class="nowrap">
									<span class="glyphicon glyphicon-time"></span>
									&nbsp; <span class="date" data-date="{!! $child->published_at !!}">
										{!! HTML::humanDateFormat($child->published_at) !!}
									</span>
								</small>
								@endif
								
							</span>
						</div>
						
						<div class="media-right media-middle sm-hidden text-right">
							<a href="{!! '/learn' . $child->path . $child->wid !!}" class="media-object btn">Подробнее</a>
						</div>
						@endif
						
					</div>
					<hr>

					@endforeach
				</div>
			</div>
			{!! $childrens->links() !!}
			@endif