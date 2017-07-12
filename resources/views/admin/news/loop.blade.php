					@if(@$news && $news->count())
						
						@foreach($news AS $new)
						
								<div class="lv-item media" style="{{ $new->public < 1 ? ($new->public < 0 ? 'opacity:.4' : 'opacity:.6') : 'opacity:1' }}">

                                    <div class="media-body">
                                        <div class="lv-title">
											<b>{!! link_to_route('admin.news.show', $new->title, [$new->id]) !!}</b> 
											<span class="pull-right text-info">{!! $new->parent ? link_to_route('admin.news.show',$new->parent->title,$new->parent->id) : '' !!}</span>
										</div>
                                        <small class="lv-small">{!! $new->intro !!}</small>
                                        
										<span class="pull-left">
											<ul class="lv-attrs">
												@if($new->author)
												<li>
													<span class="glyphicon glyphicon-user" aria-hidden="true"></span> {!! $new->author !!}
												</li>
												@endif
											</ul>
										</span>
										<span class="pull-right">
											
											{{ Form::open(['route' => ['admin.news.show', $new->id], 'class'=>'pull-left text-right']) }}
												{!! Form::hidden('_method', 'GET') !!}
												{!! Form::button('Править', ['class'=>'btn-link before-glyphicon glyphicon-edit', 'type'=>'submit']) !!}
											{{ Form::close() }}
										
											@if($new->id > 1)
											{{ Form::open(['route' => ['admin.news.destroy', $new->id], 'class'=>'pull-left text-right']) }}
												{!! Form::hidden('_method', 'DELETE') !!}
												{!! Form::button('', ['class'=>'btn-link before-glyphicon before-glyphicon-danger glyphicon-trash delete', 'type'=>'submit']) !!}
											{{ Form::close() }}
											@endif

										</span>
                                        

                                    </div>
                                </div>


						@endforeach
						
					@else
						<div class="lv-item media">
						<p>Ничего не найдено</p>
						</div>
						
					@endif	