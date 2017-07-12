					@if(@$companies && $companies->count())
						
						@foreach($companies AS $company)
						
								<div class="lv-item media">

                                    <div class="media-body">
                                        <div class="lv-title">
											<a href="{{ route('admin.company.show', [$company->id]) }}">{{ ($company->company_prefix ? $company->company_prefix . ' ' : '' ) }}<b>&laquo;{{ $company->company_name }}&raquo;</b>{{ (($company->company_postfix ? ' ' . $company->company_postfix : '' )) }}</a>
										</div>
                                        <small class="lv-small">{!! $company->company_info !!}</small>
                                        
										<span class="pull-left">
											<ul class="lv-attrs">
												@if($company->entity_type)
												<li>
													<span class="glyphicon glyphicon-tag" aria-hidden="true"></span> {!! $company->entity_type !!}
												</li>
												@endif
												@if($company->company_url)
												<li>
													<span class="glyphicon glyphicon-link" aria-hidden="true"></span> {!! $company->company_url !!}
												</li>
												@endif
											</ul>
										</span>
										<span class="pull-right">
											
											{{ Form::open(['route' => ['admin.company.show', $company->id], 'class'=>'pull-left text-right']) }}
												{!! Form::hidden('_method', 'GET') !!}
												{!! Form::button('Править', ['class'=>'btn-link before-glyphicon glyphicon-edit', 'type'=>'submit']) !!}
											{{ Form::close() }}
										
											@if($company->id > 1)
											{{ Form::open(['route' => ['admin.company.destroy', $company->id], 'class'=>'pull-left text-right']) }}
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