					@foreach($wishes as $w)

						
						<div class="status_all status_{{ $w->public }}">
							<h4>{{ $w->author_name }} <span>{!! HTML::humanDateFormat($w->created_at) !!}</span></h4>
							<h5 class="title">{{ $w->title }}</h5>
							<p>{{ $w->text }}</p>
							
						</div>

					@endforeach