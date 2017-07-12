					@if(@$wishes && $wishes->count())
						
						@foreach($wishes AS $wish)
						
								<div class="lv-item media {!! $wish->public ? ($wish->public>0 ? '' : 'bg-danger') : 'bg-warning' !!}"">
                                    <div class="hidden checkbox pull-left">
                                        <label>
                                            <input type="checkbox" value="">
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                    <div class="media-body">
										
										<div class="lv-title">
											@if($wish->author)
											<a href="{{ route('admin.user.show',$wish->author->id) }}">{!! $wish->author_email !!}</a> <b>{!! $wish->author_name ? $wish->author_name : (@$wish->author ? @$wish->author->firstname : 'пользователь не найден' ) !!}</b>
											@else
											{!! $wish->author_email !!} <b>{!! $wish->author_name ? $wish->author_name : 'пользователь не найден' !!}</b>
											@endif
										</div>
											
										<small class="lv-small">{!! $wish->text !!}</small>
                                        
										<span class="pull-left">
											<ul class="lv-attrs">
													<li>
														<span class="label label-success">
															{!! $wish->year !!}
														</span>
													</li>
													<li>
														<span class="label label-warning">
															<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
															{!! $publics[$wish->public] !!}
																~ {!! HTML::humanDateFormat( $wish->created_at ) !!}
														</span>
													</li>
											</ul>
										</span>
										<span class="pull-right">
											

											{{ Form::open(['route' => ['admin.wish.edit', $wish->id], 'class'=>'pull-left text-right']) }}
												{!! Form::hidden('_method', 'GET') !!}
												{!! Form::button('Править', ['class'=>'btn-link before-glyphicon glyphicon-edit', 'type'=>'submit']) !!}
											{{ Form::close() }}
											
											{{ Form::open(['route' => ['admin.wish.update', $wish->id], 'class'=>'pull-left text-right confirm']) }}
												{!! Form::hidden('_method', 'PUT') !!}
												<select name="public" class="autosubmit select-public">
													@foreach($publics AS $public_value => $public)
													<option value="{{ $public_value }}" {{ $wish->public==$public_value ? 'selected' :'' }}>
														{!! $public !!}
													</option>
													@endforeach													
												</select>
												{!! Form::button('Изменить', ['class'=>'hidden btn-link', 'type'=>'submit']) !!}
											{{ Form::close() }}
											
										</span>
                                        

                                    </div>
                                </div>


						@endforeach
						
					@else
				
						<div class="lv-item media">Ничего не найдено</div>
						
					@endif	