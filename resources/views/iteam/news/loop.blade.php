			@foreach($childrens as $child)
				<div class="box list_item">
					<div class="list_item_body">
						<div class="list_item_preinfo">
							<div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($child->created_at)) }}</time></div>
						</div>						
						<h4 class="list_item_title">
						{!! link_to('news' . $child->path . $child->wid, $child->title) !!}
						</h4>
						<div class="list_item_text">
							<div class="intro">{!! @$child->intro !!}</div>
						</div>
					</div>
				</div>
			@endforeach