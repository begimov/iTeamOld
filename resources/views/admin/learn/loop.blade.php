					@if(@$learns && $learns->count())
						
						@foreach($learns AS $learn)
						
								<div class="lv-item media" style="{{ $learn->public < 1 ? ($learn->public < 0 ? 'opacity:.4' : 'opacity:.6') : 'opacity:1' }}">
								
									<a href="" class="pull-left">
										<img src="{!! $learn->img !!}" alt="" class="lv-img-sm">
									</a>
									
                                    <div class="media-body">
                                        <div class="lv-title">
											<b>{!! link_to_route('admin.learn.show', $learn->title, [$learn->id]) !!}</b> 
											<span class="pull-right text-info">{!! $learn->parent ? link_to_route('admin.learn.show',$learn->parent->title,$learn->parent->id) : '' !!}</span>
										</div>
                                        <small class="lv-small">{!! $learn->intro !!}</small>
                                        
										<span class="pull-left">
											<ul class="lv-attrs">
												@if($learn->children)
												<li>
													@if($learn->childrens->count())
													<a href="{{ route('admin.learn.index') . '?parent_id=' . $learn->id }}"><span class="zmdi zmdi-folder-outline" aria-hidden="true"></span> {!! $learn->childrens->count() !!}</a>
													@else
													<span class="zmdi zmdi-folder-outline" aria-hidden="true"></span> {!! $learn->children !!}
													@endif
												</li>
												@else
												<li>
													{!! $learn->price>0 ? HTML::priceFormatHtml(@$learn->price, $learn->currensy) : 'Бесплатно' !!}
												</li>
												@endif
												
												@if($learn->author)
												<li>
													<span class="glyphicon glyphicon-user" aria-hidden="true"></span> {!! $learn->author !!}
												</li>
												@endif
											</ul>
										</span>
										<span class="pull-right">
											
											{{ Form::open(['route' => ['admin.learn.show', $learn->id], 'class'=>'pull-left text-right']) }}
												{!! Form::hidden('_method', 'GET') !!}
												{!! Form::button('Править', ['class'=>'btn-link before-glyphicon glyphicon-edit', 'type'=>'submit']) !!}
											{{ Form::close() }}
										
											@if($learn->id > 1)
											{{ Form::open(['route' => ['admin.learn.destroy', $learn->id], 'class'=>'pull-left text-right']) }}
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