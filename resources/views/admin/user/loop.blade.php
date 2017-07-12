					@if(@$users && $users->count())
						
						@foreach($users AS $user)
						
								<div class="lv-item media"">
                                    <div class="hidden checkbox pull-left">
                                        <label>
                                            <input type="checkbox" value="">
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                    <div class="pull-left">
										@if($user->avatar)
                                        <img class="lv-img-sm" src="/filemanager/userfiles/user{{ $user->id }}/100/{!! $user->avatar !!}" alt="">
										@else
                                        <img class="lv-img-sm" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAAP1BMVEXKysr////Nzc39/f3b29v39/fp6enY2Njt7e3U1NTPz8/5+fn7+/vz8/Px8fHg4ODR0dHd3d329vbl5eXi4uIjR8oRAAABNklEQVRIx+3UzXKFIAwF4EsM4R9BfP9nbRcda8wtZNptz9pvDBjP6z8yAC2EBqAHze3kPe2uKVFEKsl8JhXCqBJ7zeYrue5RI4q5pawNYDUsFWFBAplHKMwFdPsktsOURDIiFOdzVUnqfDJ3SHK4+X1ZSSyC6vT6879/y/wsRZLipiR4SXyYknjmp8hnXKxYEXOtlqyNxEUabbXJzmc2lnew3n7Pzo6g+o+/BWHUdcVlWGNMnq/ldl11riB0OvK2mVu2LR/UA/wAdm+v55myfn+HAIkDjghBCp844CiJ2wYnhDCOmzYsF9LY0R6FJ4QwvATjadfEsr8gUDbLZNab7pprOplj9aUhrNDQaojFP5JkFEk3Al1HOtyIajDWtKi7MWS9qiHFsV7VfH3WtHGk9Y6lEV+/zAcZmA3NFb40HgAAAABJRU5ErkJggg==" alt="">
										@endif
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title"><a href="{{ route('admin.user.show',$user->id) }}">{!! $user->email !!}</a> <b>{!! $user->username !!}</b></div>
                                        <small class="lv-small"><b>{!! $user->name !!} {!! $user->lastname !!}</b> {!! $user->entity_type !!} {!! $user->company_name !!}</small>
                                        
										<span class="pull-left">
											@if($user->orders->count())
												<a class="before-glyphicon glyphicon-shopping-cart" href="{{ route('admin.order.index') }}?search={{ $user->email }}">Заказы ({{ $user->orders->count() }})</a>
											@endif
										</span>
										<span class="pull-right">
											
											<span class="pull-left">
											<a class="before-glyphicon glyphicon-edit" href="{{ route('admin.user.show',$user->id) }}">Профиль</a>
											</span>
											
											@if($user->id > 1)
											<span class="pull-left">
											{{ Form::open(['route' => ['admin.user.destroy', $user->id], 'class'=>'pull-left text-right']) }}
												{!! Form::hidden('_method', 'DELETE') !!}
												{!! Form::button('', ['class'=>'btn-link before-glyphicon before-glyphicon-danger glyphicon-trash delete', 'type'=>'submit']) !!}
											{{ Form::close() }}
											</span>
											@endif
											
										</span>
                                        

                                    </div>
                                </div>


						@endforeach
						
					@else
				
						<div class="lv-item media">Ничего не найдено</div>
						
					@endif	