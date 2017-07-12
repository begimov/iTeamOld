					@if(@$articles && $articles->count())
						
						@foreach($articles AS $article)
						
								<div class="lv-item media" style="{{ $article->public < 1 ? ($article->public < 0 ? 'opacity:.4' : 'opacity:.6') : 'opacity:1' }}">

                                    <div class="media-body">
                                        <div class="lv-title">
											<b>{!! link_to_route('admin.article.show', $article->title, [$article->id]) !!}</b> 
											<span class="pull-right text-info">{!! $article->parent ? link_to_route('admin.article.show',$article->parent->title,$article->parent->id) : '' !!}</span>
										</div>
                                        <small class="lv-small">{!! $article->intro !!}</small>
                                        
										<span class="pull-left">
											<ul class="lv-attrs">
												@if($article->children)
												<li>
													@if($article->childrens->count())
													<a href="{{ route('admin.article.index') . '?parent_id=' . $article->id }}"><span class="zmdi zmdi-folder-outline" aria-hidden="true"></span> {!! $article->childrens->count() !!}</a>
													@else
													<span class="zmdi zmdi-folder-outline" aria-hidden="true"></span> {!! $article->children !!}
													@endif
												</li>
												@endif
												@if($article->author)
												<li>
													<span class="glyphicon glyphicon-user" aria-hidden="true"></span> {!! $article->author !!}
												</li>
												@endif
											</ul>
										</span>
										<span class="pull-right">
											
											{{ Form::open(['route' => ['admin.article.show', $article->id], 'class'=>'pull-left text-right']) }}
												{!! Form::hidden('_method', 'GET') !!}
												{!! Form::button('Править', ['class'=>'btn-link before-glyphicon glyphicon-edit', 'type'=>'submit']) !!}
											{{ Form::close() }}
										
											@if($article->id > 1)
											{{ Form::open(['route' => ['admin.article.destroy', $article->id], 'class'=>'pull-left text-right']) }}
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