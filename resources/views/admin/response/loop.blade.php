@if(@$responses && $responses->count())

	@foreach($responses AS $response)

		<div class="lv-item media {!! $response->public ? ($response->public>0 ? '' : 'bg-danger') : 'bg-warning' !!}"">
		<div class="hidden checkbox pull-left">
			<label>
				<input type="checkbox" value="">
				<i class="input-helper"></i>
			</label>
		</div>
		<div class="media-body">

			<div class="lv-title">
				@if($response->author)
					<a href="{{ route('admin.user.show',$response->author->id) }}">{!! $response->author_name ? $response->author_name : (@$response->author ? @$response->author->firstname : 'пользователь не найден' ) !!}</a>
				@else
					{!! $response->author_name ? $response->author_name : 'пользователь не найден' !!}
				@endif
			</div>

			<small class="lv-small">{!! $response->text !!}</small>

			<span class="pull-left">
											<ul class="lv-attrs">
													
													@if($response->learn_id && $response->learn)
													<li>
														<span class="label label-success">
														{!! $response->learn->title !!}
														</span>
													</li>
												@else
													<li>
														<span class="label label-danger">
														ОБЩИЙ ОТЗЫВ
														</span>
													</li>
												@endif

												<li>
														<span class="label label-warning">
															<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
															{!! $publics[$response->public] !!}
															~ {!! HTML::humanDateFormat( $response->created_at ) !!}
														</span>
													</li>
											</ul>
										</span>
			<span class="pull-right">
											<div>
												<ul>
													<li>
														<a href="{{ route('admin.response.edit', ['id' => $response->id]) }}">Редактировать</a>
													</li>
													<li>
														<a href="{{ route('admin.response.destroy', ['id' => $response->id]) }}">Удалить</a>
													</li>
												</ul>
											</div>

				{{--{{ Form::open(['route' => ['admin.response.update', $response->id], 'class'=>'pull-left text-right confirm']) }}--}}
				{{--{!! Form::hidden('_method', 'PUT') !!}--}}
				{{--<select name="public" class="autosubmit select-public">--}}
				{{--@foreach($publics AS $public_value => $public)--}}
				{{--<option value="{{ $public_value }}" {{ $response->public==$public_value ? 'selected' :'' }}>--}}
				{{--{!! $public !!}--}}
				{{--</option>--}}
				{{--@endforeach													--}}
				{{--</select>--}}
				{{--{!! Form::button('Изменить', ['class'=>'hidden btn-link', 'type'=>'submit']) !!}--}}
				{{--{{ Form::close() }}--}}
											
										</span>


		</div>
		</div>


	@endforeach

@else

	<div class="lv-item media">Ничего не найдено</div>

@endif	