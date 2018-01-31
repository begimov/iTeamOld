@extends('iteam.template')

@section('title')
	{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}
@stop

@section('main')

    <div class="row">
		
		<div class="article col-lg-12">

			@if(@$crumbs)
			<div id="crumb">
				<nav id="crumbs">
				@foreach($crumbs as $crumb)
					{!! link_to($crumb->path . $crumb->wid, $crumb->title, ["class"=>"crumb_parent crumb_" . ($crumb->deep-1) ]) !!} <span class="crumb_separator">&rarr;</span>
				@endforeach
				</nav>
			</div>
			@endif

			<div class="box">
			    
<!-- <div class="row articlesGeneralMagnet" style="margin-top:20px; display: none;">        
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">
<div class="row vertical-align">
<div class="col-md-5 col-sm-5" style="margin: -30px 0;"><img alt="" class="pull-right img-responsive" src="img/var4_7.png" /></div>
<div class="col-md-7 col-sm-7 text-left" style="padding: 10px 0;">
<h4><strong>Вам подарок!</strong></h4>
<h5>КНИГА &laquo;Как внедрить бизнес-процессы&raquo;!</h5>
<div style="float:left; margin-top:5px;"><script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=Bh5z&webforms_id=5388406"></script></div>
</div>
</div>
</div>
</div>
</div>
</div> -->

<div class="row articlesGeneralMagnet" style="margin-top:20px; display: none;">		
    <div class="col-md-12">
        <!-- <a href="https://iteam.ru/promo/marafon/" class="nounderline"> -->
            <div class="panel panel-default" style="padding:0 10px;background: url('https://iteam.ru/img/bg_index_marafon.jpg');background-size: cover;background-repeat: no-repeat;color: #fff;">
                <div class="panel-body">
                    <div class="row vertical-align">
                        <div class="col-md-12 text-center" style="padding: 10px 0;">
                            <h4><strong>Бесплатный онлайн-марафон &laquo;Русский менеджмент. Бизнес как система&raquo;.</strong></h4>
                            <h5 style="margin-bottom:20px;"><span class="label label-primary">СТАРТ 12 февраля</span></h5>
                            <!-- <button class="btn btn-danger" style="margin-top: 5px;">УЧАСТВОВАТЬ</button> -->
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <form action="/grform" method="get" id="grForm">
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group form-group-lg">
                                    <input type="text" class="form-control" name="name" placeholder="Имя">
                                 </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group form-group-lg">
                                    <input type="email" class="form-control" name="email" placeholder="Эл.адрес">
                                 </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group form-group-lg">
                                    <input type="email" class="form-control" name="phone" placeholder="Телефон">
                                  </div>
                                </div>
                                <input type="hidden" name="campaign_token" value="ngWDi" />
                            </div>
                            <a href="#" class="btn btn-danger btn-lg" id="grFormBtn" style="margin-bottom: 10px;" data-loading-text="<div class='spinner'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>">УЧАСТВОВАТЬ</a>
                            </form>
                            <p class="help-block alert-danger" style="display: none;padding: 10px;" id="grFormHelpBlock"></p>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </a> -->
    </div>
</div>

				<h2 class="title">{{ @$page->title }}</h2>
				<div class="row" style="border-top:1px solid #eee;border-bottom:1px solid #eee;padding:4px 0;margin:8px 0;">
					<div class="fl oh col-lg-6 col-sm-6 text-left">
						<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
					</div>
					<div class="fr oh col-lg-6 col-sm-6 text-right">
					@if(@$page->author)
						<h4 class="author">{!! $page->author !!}</h4>
					@endif
					</div>
				</div>
				<div class="row" style="margin-top: -40px; margin-left: 15px">
					@if(count($marks) != 0)
						<div style="font-size: 14px">
							<div style="float: left;">
								<b>Метки:</b>
							</div>
							<div>
								<ul style="list-style-type: none; margin-left: 0px">
									@foreach($marks as $mark)
										<li style="float: left; margin-left: 15px"><a href="{{ route('site.mark.get-list', ['id' => $mark->id_mark]) }}">{{ $mark->mark->name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					@endif
				</div>

				
					@if(@$outro)
					<div class="outro">{!! $outro !!}</div>
					@endif

				
				
				<div>{!! $page->text !!}</div>
				
<!-- <div class="row articlesGeneralMagnet" style="margin-top:20px; display: none;">        
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">
<div class="row vertical-align">
<div class="col-md-5 col-sm-5" style="margin: -30px 0;"><img alt="" class="pull-right img-responsive" src="img/var4_7.png" /></div>
<div class="col-md-7 col-sm-7 text-left" style="padding: 10px 0;">
<h4><strong>Вам подарок!</strong></h4>
<h5>КНИГА &laquo;Как внедрить бизнес-процессы&raquo;!</h5>
<div style="float:left; margin-top:5px;"><script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=Bh5z&webforms_id=5388406"></script></div>
</div>
</div>
</div>
</div>
</div>
</div> -->

<div class="row articlesGeneralMagnet" style="margin-top:20px; display: none;">		
    <div class="col-md-12">
        <a href="https://iteam.ru/promo/marafon/" class="nounderline">
            <div class="panel panel-default" style="padding:0 10px;background: url('https://iteam.ru/img/bg_index_marafon.jpg');background-size: cover;background-repeat: no-repeat;color: #fff;">
                <div class="panel-body">
                    <div class="row vertical-align">
                        <div class="col-md-12 text-center" style="padding: 10px 0;">
                            <h4><strong>Бесплатный онлайн-марафон &laquo;Русский менеджмент. Бизнес как система&raquo;.</strong></h4>
                            <h5 style="margin-bottom:20px;"><span class="label label-primary">СТАРТ 12 февраля</span></h5>
                            <button class="btn btn-danger" style="margin-top: 5px;">УЧАСТВОВАТЬ</button>
                        </div>
                    </div>
                    <!-- <div class="row text-center">
                        <div class="col-md-12">
                            <form action="/grform" method="get" id="grForm">
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group form-group-lg">
                                    <input type="text" class="form-control" name="name" placeholder="Имя">
                                 </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group form-group-lg">
                                    <input type="email" class="form-control" name="email" placeholder="Эл.адрес">
                                 </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group form-group-lg">
                                    <input type="email" class="form-control" name="phone" placeholder="Телефон">
                                  </div>
                                </div>
                                <input type="hidden" name="campaign_token" value="ngWDi" />
                            </div>
                            <a href="#" class="btn btn-danger btn-lg" id="grFormBtn" style="margin-bottom: 10px;" data-loading-text="<div class='spinner'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>">УЧАСТВОВАТЬ</a>
                            </form>
                            <p class="help-block alert-danger" style="display: none;padding: 10px;" id="grFormHelpBlock"></p>
                        </div>
                    </div> -->
                </div>
            </div>
        </a>
    </div>
</div>
				
			</div>

			@if(@$outro)
			<div class="outro">{!! $outro !!}</div>
			@endif
	
		</div>

		@if(count($marks) != 0)
			<div style="font-size: 14px; margin-left: 15px">
				<div style="float: left;">
					<b>Метки:</b>
				</div>
				<div>
					<ul style="list-style-type: none">
						@foreach($marks as $mark)
							<li style="float: left; margin-left: 15px"><a href="{{ route('site.mark.get-list', ['id' => $mark->id_mark]) }}">{{ $mark->mark->name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif
		

    </div>

@stop

@section('edit-link')

	@if(Auth::user() && @Auth::user()->role_id<3)
		<div class="admin-edit"><a class="admin-edit-link" target="_blank" href="{{ route('admin.article.show',$page->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></div>
	@endif

@stop

@section('scripts')

	<script>
        $(document).ready(function () {
        if ( !$( "#articleSpecialMagnet" ).length ) {
 
            $( ".articlesGeneralMagnet" ).show();
         
        }
        });
    </script>
    
    <script>
        $(document).ready(function () {
            
            $('#grFormBtn').click(function (e) {
                e.preventDefault();
                var $this = $(this);
                $this.button('loading');
                var data = $('#grForm').serialize();
                $.ajax({
                    url: "/grform",
                    type: "get",
                    data: data,
                    success: function (response) {
                        if (response.status === 'ok') {
                            $('#grFormHelpBlock').css("display","none");
                            window.location.href = 'https://iteam.ru/promo/marafon/#/purchase';
                        } else if (response.status === 'error') {
                            $('#grFormHelpBlock').text(response.msg)
                            $('#grFormHelpBlock').css("display","block");
                        }
                        $this.button('reset');
                    },
                    error: function (response) {
                        $this.button('reset');
                        if (response.status === 422) {
                            $('#grFormHelpBlock').text('Все поля обязательны к заполнению')
                            $('#grFormHelpBlock').css("display","block");
                        } else {
                            $('#grFormHelpBlock').text('Ошибка, пожалуйста проверьте правильность введенных данных и попробуйте еще раз')
                            $('#grFormHelpBlock').css("display","block");
                        }
                    }
                });
            });
        });
    </script>

@stop