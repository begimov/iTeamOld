					<ul class="chat">
					@foreach($responses as $response)

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
									<a href="/company/response/{{ $response->id }}">#</a>
								</div>
								<div class="chat-text">
								{!! $response->text !!}
								</div>
								
								@if(@$learn_title && $response->learn)
								<div class="chat-footer">
									<i class="pull-right text-info">Отзыв на мастер-проект &laquo;<a href="{{ route('learn', ['path'=>ltrim($response->learn->path,'/').$response->learn->wid]) }}">{!! $response->learn->title !!}&raquo;</a></i>
								</div>
								@endif
								
							</div>
						</li>

					@endforeach
					</ul>