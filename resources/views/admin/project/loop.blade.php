					@if(@$projects && $projects->count())
						
						@foreach($projects AS $project)
						
								<div class="lv-item media">

                                    <div class="media-body">
                                        <div class="lv-title">
											<a href="{{ route('admin.project.show', [$project->id]) }}"><b>{{ $project->company->company_name }}</b></a>
										</div>
                                        <small class="lv-small">{!! $project->project_info !!}</small>
                                        

										<span class="pull-right">
											
											{{ Form::open(['route' => ['admin.project.show', $project->id], 'class'=>'pull-left text-right']) }}
												{!! Form::hidden('_method', 'GET') !!}
												{!! Form::button('Править', ['class'=>'btn-link before-glyphicon glyphicon-edit', 'type'=>'submit']) !!}
											{{ Form::close() }}
										
											@if($project->id > 1)
											{{ Form::open(['route' => ['admin.project.destroy', $project->id], 'class'=>'pull-left text-right']) }}
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