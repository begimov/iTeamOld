@extends('c.template_no_fb')

@section('title')
    Профиль |
@stop

@section('main')

    <section class="content">
        <div class="container">

            <br class="temp-correct">

            <div class="row">
                <div class="box">

                    <div class="col-lg-2 col-sm-2">
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation" class="active">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    <span class="hidden-sm"> &nbsp; Профиль</span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="/i/order">
                                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                    <span class="hidden-sm"> &nbsp; Мои заказы</span>
                                </a>
                            </li>
                            <li class="hidden" role="presentation">
                                <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                    <span class="hidden-sm"> &nbsp; Настройки</span>
                                </a>
                            </li>
                            <li style="background-color: lightgreen; border-radius: 4px; margin-top: 10px">
                                <a href="mailto:support@iteam.ru">
                                    <span style="color: black">Нужна помощь?</span>
                                    <span class="hidden-sm" style="color: black"> &nbsp; support@iteam.ru</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-10 col-sm-10">


                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="profile">
                                <div class="row">
                                    {!! Form::model($user, ['route' => 'profile.post', 'class' => 'validate', 'files' => true]) !!}
                                    <div class="col-lg-3 col-sm-3">

                                        <div class="thumbnail text-center">
                                            <label class="file-label{!! $errors->has('avatar') ? ' has-error' : '' !!}">
                                                @if($user->avatar)
                                                    <img src="/filemanager/userfiles/user{{ $user->id }}/200/{!! $user->avatar !!}">
                                                    <div class="caption">
                                                        <p><span class="link">Изменить аватар</span></p>
                                                        @else
                                                            <span class="icon-avatar glyphicon glyphicon-user img-circle bg-success"
                                                                  aria-hidden="true"></span>
                                                            <div class="caption">
                                                                <p><span class="link">Добавить аватар</span></p>
                                                                @endif
                                                                {!! Form::file('avatar') !!}
                                                                {!! $errors->has('avatar') ? $errors->first('avatar', '<small class="help-block">:message</small>') : '' !!}
                                                            </div>
                                            </label>
                                            {!! Form::submit('Сохранить', ['','hidden btn btn-sm btn-success']) !!}
                                        </div>

                                    </div>
                                    <div class="col-lg-9 col-sm-9">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                {!! Form::group('email', 'email', $errors, null, null, 'envelope', null, ['placeholder'=>'Email', 'disabled'=>'disabled']) !!}
                                                {!! Form::group('tel', 'phone', $errors, null, null, 'phone-alt', null, ['placeholder'=>'Телефон'], 'visible[phone]') !!}
                                                {!! Form::group('text', 'username', $errors, null, null, 'user', null, ['placeholder'=>'Логин']) !!}
                                                {!! Form::group('text', 'firstname', $errors, null, null, 'apple', null, ['placeholder'=>'Имя'], 'visible[firstname]') !!}
                                                {!! Form::group('text', 'lastname', $errors, null, null, 'tree-deciduous', null, ['placeholder'=>'Фамилия'], 'visible[lastname]') !!}
                                                {!! Form::group('textarea', 'about', $errors, null, null, 'education', null, ['placeholder'=>'О себе']) !!}

                                                {!! Form::submit('Сохранить', ['','btn btn-lg btn-primary']) !!}
                                                <hr>
                                                {!! Form::group('password', 'password', $errors, 'Смена пароля', null, 'lock', 'eye-open show-password', ['placeholder'=>'Пароль', 'minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Только латинские буквы, цифры или знаки _@#$%^&*-. От 6 до 32 символов']) !!}
                                                {!! Form::group('password', 'password_confirmation', $errors, null, null, 'lock', 'eye-open show-password', ['placeholder'=>'Подтвердите пароль', 'minlength'=>6, 'maxlength'=>32, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Точно, как в предыдущем поле']) !!}


                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                {!! Form::group('text', 'contacts', $errors, null, null, ['<span class="glyphicon glyphicon-link" aria-hidden="true"></span>','http://'], null, ['placeholder'=>'Сайт'], 'visible[url]') !!}
                                                @if(1)
                                                    <div class="row">
                                                        <div class="col-lg-8 col-sm-7">
                                                            {!! Form::group('text', 'company_name', $errors, null, null, 'barcode', null, ['placeholder'=>'Компания (название)']) !!}
                                                        </div>
                                                        <div class="col-lg-4 col-sm-5">
                                                            {!! Form::group('text', 'entity_type', $errors, null, null, null, null, ['placeholder'=>'ИП/ООО/ЗАО/...']) !!}
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        <div class="col-lg-5 col-sm-5 col-xs-5">
                                                            {!! Form::group('text', 'entity_type', $errors, null, null, 'registration-mark', null, ['placeholder'=>'ИП/ООО/ЗАО/...']) !!}
                                                        </div>
                                                        <div class="col-lg-7 col-sm-7 col-xs-7">
                                                            {!! Form::group('text', 'company_name', $errors, null, null, 'barcode', null, ['placeholder'=>'Компания (название)']) !!}
                                                        </div>
                                                    </div>
                                                @endif
                                            <!--div class="form-group">
<div class="input-group">

<span class="input-group-addon">
<span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
</span>

<div class="input-group-addon">
<a type="button" class="-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ОПФ<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">ИП</a></li>
          <li><a href="#">ООО</a></li>
          <li><a href="#">ЗАО</a></li>
          <li><a href="#">ОАО</a></li>
          <li><a href="#">ТСЖ</a></li>
          <li><a href="#">ПИФ</a></li>
          <li><a href="#">нет / фриланс и пр.</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Иное</a></li>
        </ul>
</div>

<input type="text" class="form-control" value="" placeholder="Название компании">
</div>
</div-->
                                                {!! Form::group('text', 'country', $errors, null, null, 'globe', null, ['placeholder'=>'Страна']) !!}
                                                {!! Form::group('text', 'region', $errors, null, null, 'flag', null, ['placeholder'=>'Регион'], 'visible[region]') !!}
                                                {!! Form::group('text', 'city', $errors, null, null, 'home', null, ['placeholder'=>'Город'], 'visible[city]') !!}
                                                {!! Form::group('textarea', 'adress', $errors, null, null, 'map-marker', null, ['placeholder'=>'Адрес'], 'visible[adress]') !!}

                                            </div>
                                        </div>
                                        {!! Form::submit('Сохранить', ['','btn btn--lg btn-primary']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane" id="settings">
                            </div>

                        </div>


                    </div>

                </div>
            </div>


        </div>
    </section>

@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/locale/ru.js"></script>
    <script>
        (function ($) {

            $('.date').each(function (i, e) {
                //var time = moment($(e).data('date'));
                //if(now.diff(time, 'days') <= 1) {
                //	$(e).html(time.from(now));
                //}
                $(e).html(moment($(e).data('date')).calendar());
            });

            function validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }

            function validatePassword(password) {
                var re = /^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/;
                return re.test(password);
            }

            function validateUsername(username) {
                var re = /^[a-z0-9_-]{2,32}$/;
                return re.test(username.toLowerCase());
            }

            function validateInput(input) {
                var ok = 0, vu = 0, ve = 0,
                    required = input.prop('required'),
                    minlength = input.attr('minlength'),
                    maxlength = input.attr('maxlength'),
                    email = input.is('[type="email"]')
                log = input.is('[name="log"]')
                password = input.is('[type="password"]')
                confirmation = input.is('[name="password_confirmation"]') ? $('[name="password"]').val() : false,
                    val = input.val(),
                    vallength = val.length;

                if (required && !vallength) {
                    input.attr('data-original-title', (input.data('required-error') || 'Это поле обязательно к заполнению'));
                }
                else ok = 1;

                if (minlength && vallength < minlength) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('minlength-error') || 'Минимальная длина поля: ' + minlength + ' символов'));
                }
                if (maxlength && vallength > maxlength) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('maxlength-error') || 'Максимальная длина поля: ' + minlength + ' символов'));
                }
                if (email && !validateEmail(val)) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('email-error') || 'Укажите корректный Email-адрес'));
                }
                if (log) {
                    ve = validateUsername(val);
                    vu = validateEmail(val);
                    if (!(ok = ve || vu)) input.attr('data-original-title', (input.data('email-error') || (!ve ? 'Укажите корректный Email-адрес или Ваш Логин' : 'Для логина используют только латинские буквы, цифры и _-') ));
                }
                if (password && !validatePassword(val)) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('password-error') || 'Допустимые символы: латинские буквы, цифры или знаки _~!@#$%^&*-.'));
                }
                // && val != $('[name="'.input.data('forname').'"]').val()
                if (password && confirmation && val != confirmation) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('confirmation-error') || 'Пароли не совпадают'));
                }
                return ok;
            }

            $('input[data-toggle="tooltip"]').on('focus', function () {
                $(this).tooltip('show');
            });

            $('input[name="avatar"]').on('change', function (e) {
                $(this).parent('div').parent('label').next('div').children('input[type="submit"]').removeClass('hidden');
            });

            $('form.validate input').on('keyup change paste', function (e) {
                var input = $(this), ok = validateInput(input), tt = input.is('[data-toggle="tooltip"]');
                if (!ok) {
                    input.parent().removeClass('has-success').addClass('has-error');
                    if (tt) input.tooltip('show');
                }
                else {
                    input.parent().removeClass('has-error').addClass('has-success');
                    if (tt) input.tooltip('hide');
                }
            });

            $('form.validate').on('submit', function (e) {

                var form = $(this), errors = 0;
                if (form.not('.is-valid')) {

                    var inputs = $('input[required]', form), errors = inputs.size();
                    var vallength = 0;

                    inputs.each(function () {
                        var input = $(this),
                            ok = validateInput(input);
                        errors -= ok;
                    });

                    if (!errors) {
                        form.addClass('is-valid').submit();
                        //alert('ok');
                        //e.preventDefault();
                        //return false;
                    }
                    else {
                        inputs.parent().addClass('has-error');
                        inputs.tooltip('show');
                        e.preventDefault();
                        return false;
                    }

                }

            });

            $('.show-password').on('click', function () {
                var showPassword = $(this);
                if (showPassword.is('.glyphicon-eye-open')) {
                    showPassword.removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').parent('.input-group-addon').prev('input').attr('type', 'text');
                }
                else {
                    showPassword.removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').parent('.input-group-addon').prev('input').attr('type', 'password');
                }
            });

            var windowHash = window.location.hash, tab = $('.tab-content').find(windowHash);
            if (tab) {
                //tab.tabs('show');
                $('.nav-pills li a[href="' + windowHash + '"]').tab('show');
                $('body,html').animate({scrollTop: 0}, 10);
            }

        })(jQuery);
    </script>
@stop