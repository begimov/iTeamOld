<ul class="chat">

	<li class="left clearfix">
							<span class="chat-img pull-left">

									@if(isset($vid1->author_avatar) && $vid1->author_avatar != '')
									<img alt="" class="img-circle" src="{{ $vid1->author_avatar }}" />
								@else
									<span class="glyphicon glyphicon-user img-circle" aria-hidden="true"></span>
								@endif

							</span>
		<div class="chat-body clearfix">
			<div class="chat-header">
				<strong class="primary-font">{!! $vid1->author_name !!}</strong>{!! $vid1->author_info ? ' <span class="text-info">' . $vid1->author_info . '</span>' : '' !!}{!! $vid1->company_info ? '  <span class="text-danger">' . $vid1->company_info . '</span>' : '' !!}
				<a href="/company/response/{{ $vid1->id }}">#</a>
			</div>
			<div class="chat-text">
				{!! $vid1->text !!}
			</div>

		</div>
	</li>

	<li class="left clearfix">
							<span class="chat-img pull-left">

									@if(isset($vid2->author_avatar) && $vid2->author_avatar != '')
									<img alt="" class="img-circle" src="{{ $vid2->author_avatar }}" />
								@else
									<span class="glyphicon glyphicon-user img-circle" aria-hidden="true"></span>
								@endif

							</span>
		<div class="chat-body clearfix">
			<div class="chat-header">
				<strong class="primary-font">{!! $vid2->author_name !!}</strong>{!! $vid2->author_info ? ' <span class="text-info">' . $vid2->author_info . '</span>' : '' !!}{!! $vid2->company_info ? '  <span class="text-danger">' . $vid2->company_info . '</span>' : '' !!}
				<a href="/company/response/{{ $vid2->id }}">#</a>
			</div>
			<div class="chat-text">
				{!! $vid2->text !!}
			</div>

		</div>
	</li>

	@foreach($responses as $response)

		<li class="left clearfix">
							<span class="chat-img pull-left">

									@if(isset($response->author_avatar) && $response->author_avatar != '')
									<img alt="" class="img-circle" src="{{ $response->author_avatar }}" />
								@else
									<span class="glyphicon glyphicon-user img-circle" aria-hidden="true"></span>
								@endif

							</span>
			<div class="chat-body clearfix">
				<div class="chat-header">
					<strong class="primary-font">{!! $response->author_name !!}</strong>{!! $response->author_info ? ' <span class="text-info">' . $response->author_info . '</span>' : '' !!}{!! $response->company_info ? '  <span class="text-danger">' . $response->company_info . '</span>' : '' !!}
					<a href="/company/response/{{ $response->id }}">#</a>
				</div>
				<div class="chat-text">
					{!! $response->text !!}
				</div>

				@if(@$learn_title && $response->learn)
					<div class="chat-footer">
						<i class="pull-right text-info">Отзыв на курс &laquo;<a href="{{ route('learn', ['path'=>ltrim($response->learn->path,'/').$response->learn->wid]) }}">{!! $response->learn->title !!}&raquo;</a></i>
					</div>
				@endif

			</div>
		</li>

	@endforeach
</ul>