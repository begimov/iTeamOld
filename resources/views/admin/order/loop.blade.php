					@if(@$orders && $orders->count())
						
						@foreach($orders AS $order)

							@if($order->test_id == 0)
								<div class="lv-item media {!! $order->status ? ($order->status>0 ? '' : '-bg-danger') : '-bg-warning' !!}">
							@else
								<div class="lv-item media {!! $order->status ? ($order->status>0 ? '' : '-bg-danger') : '-bg-warning' !!}" style="background: #DEE3FF">
							@endif
										<div class="hidden checkbox pull-left">
                                        <label>
                                            <input type="checkbox" value="">
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                    <div class="pull-left">
                                        <img class="lv-img-sm" src="{!!  isset($order->learn->img) ? $order->learn->img : '' !!}" alt="">
                                    </div>
                                    <div class="media-body">
										
										<div class="lv-title"><a href="{{ route('admin.user.show',$order->user_id) }}">{!! $order->email !!}</a> <b>{!! $order->name ? $order->name : (@$order->user ? @$order->user->firstname : 'пользователь не найден' ) !!}</b> {!! $order->entity_type !!} {!! $order->company_name !!} {!! $order->phone ? ' &nbsp; <small class="glyphicon glyphicon-phone-alt" aria-hidden="true"></small> ' . $order->phone : '' !!}</div>
                                        
										<small class="lv-small"><b>Заказ № {!! $order->id !!}</b>
											@if(isset($order->learn->title))
												{!! $order->learn->title !!}
											@else
												<a href="{{ route('admin.test.info', ['id' => $order->id]) }}">{{ $order->test->name }}</a>
											@endif
										</small>
										<span class="pull-left">
											<ul class="lv-attrs">
													<li>
														<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
														<span class="nowrap">
															@if($order->fact_sum == 0)
																{!! $order->sum>0 ? HTML::priceFormatHtml(@$order->sum, $order->currensy) : 'Бесплатно' !!}
															@else
																Цена:<strike>{{ $order->sum }}</strike> Фактическая цена: {{ $order->fact_sum }}
															@endif
														</span>
													</li>
													<li title="{!! $order->payment_type !!}">{!! HTML::paymentTypeText( $order->payment_type ) !!}</li>
													<li>
														@if($order->payed_at && $order->status>0)
														<span class="label label-success">
															<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
															{!! HTML::orderStatusText($order->status) !!}
																{!! HTML::humanDateFormat( $order->payed_at ) !!}
														</span>
														@else
														<span class="label label-warning">
															<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
															{!! HTML::orderStatusText($order->status) !!}
																~  07.04.2017 {!! HTML::humanDateFormat( $order->created_at ) !!} {{-- {!! HTML::humanDateFormat( $order->updated_at ) !!} --}}
														</span>
														@endif
													</li>
											</ul>
										</span>
										<span class="pull-right">

											{{--@if($order->status<1)--}}
											{{ Form::open(['route' => ['admin.order.edit', $order->id], 'class'=>'pull-left text-right']) }}
												{!! Form::hidden('_method', 'GET') !!}
												{!! Form::button('Редактировать', ['class'=>'btn-link before-glyphicon glyphicon-edit', 'type'=>'submit']) !!}
											{{ Form::close() }}
											{{--@endif--}}
											
											@if($order->payment_type==="invoicing")
											<span class="pull-left">
											<a class="btn-link before-glyphicon glyphicon-pushpin" target="_blank" href="/filemanager/userfiles/user{{ $order->user_id  }}/invoice/{{ md5( $order->email . $order->id ) }}.pdf">Счёт</a>
											</span>
											@endif
											
											{{ Form::open(['route' => ['admin.order.update', $order->id], 'class'=>'pull-left text-right confirm']) }}
												{!! Form::hidden('_method', 'PUT') !!}
												<select name="status" class="autosubmit select-status">
													@foreach($statuses AS $status)
													<option value="{{ $status }}" {{ $order->status==$status ? 'selected' :'' }}>
														{{ HTML::orderStatusText($status) }}
													</option>
													@endforeach													
												</select>
												{!! Form::button('Изменить', ['class'=>'hidden btn-link', 'type'=>'submit']) !!}
											{{ Form::close() }}
											
											
											@if($order->status<1 && $order->status>-6)
											{{ Form::open(['route' => ['admin.order.destroy', $order->id], 'class'=>'pull-left text-right']) }}
												{!! Form::hidden('_method', 'DELETE') !!}
												{!! Form::button('', ['class'=>'btn-link before-glyphicon before-glyphicon-danger glyphicon-trash delete', 'type'=>'submit']) !!}
											{{ Form::close() }}
											@endif
										</span>
                                    </div>
									<div style="color: red">
										{{ $order->description }}
									</div>
                                </div>
						@endforeach
						
					@else
				
						<div class="lv-item media">Ничего не найдено</div>
						
					@endif	