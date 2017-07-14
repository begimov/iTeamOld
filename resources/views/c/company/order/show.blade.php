@extends('c.template')

@section('main')
    @if($order->product_id > 0)
        <section id="order" class="content"
                 data-product_id="{{ $order->product_id }}"
                 data-payment_type="{{ $order->payment_type }}"
                 data-order_id="{{ $order->id }}"
                 data-user_id="{{ $user->id }}">
    @else
        <section id="order" class="content"
                 data-product_id="{{ $order->test_id }}"
                 data-payment_type="{{ $order->payment_type }}"
                 data-order_id="{{ $order->id }}"
                 data-user_id="{{ $user->id }}">
    @endif
        <div class="container">
            <br class="temp_correct">

            @if(@$order)
                <div class="row">
                    <div class="box box-orders">
                        @include('c.p.menu')

                        <div class="col-lg-10 col-sm-10">
                            <div class="well">
                                <div class="media order" data-order_id="{!! $order->id !!}">

                                    @if(isset($order->learn->img))
                                        <div class="media-left media-middle">
                                            <img class="media-object" src="{!! $order->learn->img !!}" alt="">
                                        </div>
                                    @endif

                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            @if(isset($order->learn->title))
                                                {!! $order->learn->title !!}
                                                <small class="label label-info">
                                                    <a href="{!! '/learn' . $order->learn->path . $order->learn->wid !!}" class="text-black" target="_blank">
                                                        <span class="glyphicon glyphicon-link" aria-hidden="true"></span>ссылка
                                                    </a>
                                                </small>
                                            @else
                                                {!! $order->test->name !!}
                                            @endif
                                        </h5>

                                        <p class="status status{!! $order->status !!}" data-status="{!! $order->status !!}">
                                            <span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>

                                            @if(isset($order->learn->price))
                                                <span class="nowrap">{!! $order->learn->price>0 ? HTML::priceFormatHtml($order->sum, $order->learn->currensy) : 'Бесплатно' !!}</span>
                                            @else
                                                <span class="nowrap">{!! $order->test->price>0 ? HTML::priceFormatHtml($order->sum, $order->currensy) : 'Бесплатно' !!}</span>
                                            @endif

                                            <span class="label label-default">
                                                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                                {!! HTML::paymentTypeText($order->payment_type) !!}
                                            </span>

                                            @if($order->payed_at!=='0000-00-00 00:00:00')
                                                <span class="label label-success">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                    {!! HTML::orderStatusText($order->status) !!}
                                                    {!! HTML::humanDateFormat($order->payed_at) !!}
                                                </span>
                                            @else
                                                <span class="label label-warning">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                    {!! HTML::orderStatusText($order->status) !!}~{!! HTML::humanDateFormat( $order->created_at, false) !!}
                                                </span>
                                            @endif
                                        </p>
                                    </div>

                                    @if($order->status < 1)
                                        <div class="media-right media-middle sm-hidden text-right">
                                            <a class="media-object btn" role="button" data-toggle="modal" data-target="#payModal" href="#payModal">Оплатить</a>

                                            {{ Form::open(['route' => ['orders.edit', $order->id], 'class'=>'hidden text-center ajax']) }}
                                                {!! Form::hidden('_method', 'GET') !!}
                                                {!! Form::button('Оплатить', ['class'=>'btn media-object', 'type'=>'submit']) !!}
                                            {{ Form::close() }}

                                            {{ Form::open(['route' => ['orders.destroy', $order->id], 'class'=>'text-center']) }}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {!! Form::button('Удалить', ['class'=>'before-glyphicon glyphicon-trash trash text-danger size-xs btn-as-link link', 'type'=>'submit']) !!}
                                            {{ Form::close() }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if($order->status < 1)
                                <div class="row">
                                    <div class="box">
                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="text-center">
                                                <p class="lead">Материалы будут доступны после оплаты.</p>
                                            </div>

                                            <div id="about_payment">
                                                <div id="about_payment_ya_ac" class="pay_screen payment_type-ya_ac" style="{{ ($order->payment_type==='ya_ac') ? 'display:block;' : 'display:none;' }}">
                                                    <p>Ожидаем оплаты или подтверждения от сервиса Я.Деньги (от нескольких минут до часа)</p>
                                                    <p>Не удалось оплатить? Напишите, пожалуйста о проблеме на <b>info@iteam.ru</b></p>
                                                </div>

                                                <div id="about_payment_ya_pc" class="pay_screen payment_type-ya_pc" style="{{ ($order->payment_type==='ya_pc') ? 'display:block;' : 'display:none;' }}">
                                                    <p>Ожидаем оплаты или подтверждения от сервиса Я.Деньги (от нескольких минут до часа)</p>
                                                    <p>Не удалось оплатить? Напишите, пожалуйста о проблеме на <b>info@iteam.ru</b></p>
                                                </div>

                                                <div id="about_payment_sberbank" class="pay_screen payment_type-sberbank" style="{{ ($order->payment_type==='sberbank') ? 'display:block;' : 'display:none;' }}">
                                                    <p><b>Шаг 1</b>. Пожалуйста, осуществите перевод с Вашей карты Сбербанка на карту № <b>639002389040808453</b> (на имя Ступаковой Марины Владиславовны) через Сбербанк.Онлайн или отделение банка</p>
                                                    <p><b>Шаг 2</b>. Обязательно напишите нам на адрес <b>info@iteam.ru</b>, указав номер и Ваши имя и фамилию</p>
                                                </div>

                                                <div id="about_payment_invoicing" class="pay_screen payment_type-invoicing" style="{{ ($order->payment_type==='invoicing') ? 'display:block;' : 'display:none;' }}">
                                                    <p><b>Проверьте Ваш E-Mail</b> Мы выслали счёт для оплаты в электронном виде (.pdf)</p>
                                                    <p>
                                                        <a class="btn btn-lg btn-warning before-glyphicon glyphicon-download" target="_blank" href="/filemanager/userfiles/user{{ $order->user_id }}/invoice/{{ md5($order->email.$order->id) }}.pdf" download>Скачать счёт</a>
                                                        <a class="btn btn-danger btn-xs before-glyphicon glyphicon-edit" role="button" data-toggle="modal" data-target="#payModal" href="#payModal">Изменить реквизиты счёта</a>
                                                    </p>
                                                </div>

                                                <div id="about_payment_transfer" class="pay_screen payment_type-transfer" style="{{ ($order->payment_type==='transfer') ? 'display:block;' : 'display:none;' }}">
                                                    <p><b>Шаг 1</b>. Пожалуйста, осуществите платеж в любой системе денежных переводов (Western Union, Золотая Корона и т.д.) на имя Ступаковой Марина Владиславовны (Stupakova Marina), г. Москва, +7-909-158-57-57 </p>
                                                    <p><b>Шаг 2</b>. Обязательно напишите нам на <b>info@iteam.ru</b>, указав данные платежа: дату и время, название системы, сумму и номер платежа</p>
                                                </div>

                                                <div id="about_payment_paypal" class="pay_screen payment_type-paypal" style="{{ ($order->payment_type==='paypal') ? 'display:block;' : 'display:none;' }}">
                                                    <p><b>Шаг 1</b>. Пожалуйста, войдите в Вашу учётную запись PayPal и осуществите перевод для <b>info@iteam.ru</b></p>
                                                    <p><b>Шаг 2</b>. Обязательно напишите нам на <b>info@iteam.ru</b>, указав данные платежа: дату и время, название системы (paypal), сумму и номер платежа</p>
                                                </div>
                                            </div>

                                            <div class="alert alert-warning" role="alert">
                                                <b>Внимание!</b> Возможно стоит подождать. Подтверждение платежа приходит не моментально - это зависит от выбранного способа оплаты и работы платёжного сервиса. Если Вы уверены, что оплатили и что-то не так, сообщите об этом на <a href="mailto:info@iteam.ru">info@iteam.ru</a>
                                            </div>

                                            <p><a class="btn btn-success" role="button" data-toggle="modal" data-target="#payModal" href="#payModal">Оплатить сейчас?</a></p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div id="order-pay-content" class="box">
                                        <div class="col-lg-12">
                                            @if(isset($order->learn->ptext))
                                                {!! $order->learn->ptext !!}
                                            @else
                                                <h3>Индивидуальная сылка для корпоративного прохождения теста</h3> - <strong style="color: darkred">https://iteam.ru/tests/show/{{ $order->url_test }}</strong>
                                                <p>Передайте ссылку вашим сотрудникам. Для прохождения теста необходимо быть зарегестрированным на сайте. Будьте внимательны тест можно пройти 1 раз.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@stop

@section('footer')
    @if(isset($order->learn->title))
        @include('c.modals.order')
    @else
        @include('iteam.modals.order')
    @endif
@stop

@section('scripts')
    <script src="/js/cookie.js"></script>

    <script>
        (function ($) {
            function validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }

            function validatePassword(password) {
                var re = /^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/;
                return re.test(password);
            }

            function validateUsername(username) {
                //var re = /^[a-z0-9_-]{2,32}$/;
                //return re.test(username.toLowerCase());
                return true;
            }

            function validateInput(input) {
                var ok = 0, vu = 0, ve = 0,
                    required = input.prop('required'),
                    minlength = input.attr('minlength'),
                    maxlength = input.attr('maxlength'),
                    email = input.is('[type="email"]')
                log = input.is('[name="log"]')
                password = input.is('[type="password"]')
                confirmation = input.is(
                    '[name="password_confirmation"]') ? $(
                    '[name="password"]').val() : false,
                    val = input.val(),
                    vallength = val.length;

                if (required && !vallength) {
                    input.attr('data-original-title',
                        (input.data('required-error') || 'Это поле обязательно к заполнению'));
                }
                else ok = 1;

                if (minlength && vallength < minlength) {
                    ok = 0;
                    input.attr('data-original-title',
                        (input.data('minlength-error') || 'Минимальная длина поля: ' + minlength + ' символов'));
                }
                if (maxlength && vallength > maxlength) {
                    ok = 0;
                    input.attr('data-original-title',
                        (input.data('maxlength-error') || 'Максимальная длина поля: ' + minlength + ' символов'));
                }
                if (email && !validateEmail(val)) {
                    ok = 0;
                    input.attr('data-original-title',
                        (input.data('email-error') || 'Укажите корректный Email-адрес'));
                }
                if (log) {
                    ve = validateUsername(val);
                    vu = validateEmail(val);
                    if (!(ok = ve || vu)) input.attr(
                        'data-original-title',
                        (input.data('email-error') || (!ve ? 'Укажите корректный Email-адрес или Ваш Логин' : 'Для логина используют только латинские буквы, цифры и _-') ));
                }
                if (password && !validatePassword(val)) {
                    ok = 0;
                    input.attr('data-original-title',
                        (input.data('password-error') || 'Допустимые символы: латинские буквы, цифры или знаки _~!@#$%^&*-.'));
                }
                // && val != $('[name="'.input.data('forname').'"]').val()
                if (password && confirmation && val != confirmation) {
                    ok = 0;
                    input.attr('data-original-title',
                        (input.data('confirmation-error') || 'Пароли не совпадают'));
                }
                return ok;
            }

            $('input[data-toggle="tooltip"]').on('focus',
                function () {
                    $(this).tooltip('show');
                });

            $('form.validate input').on('keyup change paste',
                function (e) {
                    var input = $(this), ok = validateInput(input),
                        tt = input.is('[data-toggle="tooltip"]');
                    if (!ok) {
                        input.parent().removeClass('has-success').addClass(
                            'has-error');
                        if (tt) input.tooltip('show');
                    }
                    else {
                        input.parent().removeClass('has-error').addClass(
                            'has-success');
                        if (tt) input.tooltip('hide');
                    }
                });

            $('form.validate').on('submit', function (e) {
                var form = $(this), errors = 0;
                if (form.not('.is-valid')) {

                    var inputs = $('input[required]', form),
                        errors = inputs.size();

                    inputs.each(function () {
                        errors -= validateInput($(this));
                    });

                    if (!errors) {

                        if (form.is('.ajax')) {

                            //var res = $('#res');
                            //res.text( 'data' );

                            var //token = $('input[name="_token"]',form).val(),
                                url = form.data('url'),
                                method = form.attr('method') || 'GET',
                                data = form.serialize();

                            $.ajax({
                                url: url,
                                type: method,
                                data: data,
                                dataType: 'json',
                                success: function (d) {
                                    if (d) {

                                        alert(d);

                                    } else alert(
                                        'Ошибка авторизации');
                                },
                                error: function (err) {
                                    if (err.status == 422) {
                                        alert(JSON.stringify(err.responseJSON));
                                    } else alert('Сбой авторизации');
                                }
                            });

                            e.preventDefault();
                            return false;
                        }
                        else form.addClass('is-valid').submit();
                    }
                    else {
                        inputs.parent().addClass('has-error');
                        inputs.tooltip('show');
                        e.preventDefault();
                        return false;
                    }

                }

            });

            var payMethod = $('#order').data('payment_type') || getCookie(
                    'payment_type');
            if (payMethod) {
                var paymentInput = $('input[value="' + payMethod + '"]');
                paymentInput.prop('checked', true).parent(
                    '.payment-change').addClass('active');
                $('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass(
                    'disabled');
                $('.pay_screen').hide();
                $('.payment_type-' + payMethod).show();
            }

            $('label.payment-change').on('click', function (e) {
                $(this).children('input').change();
                return false;
                e.preventDefault();
            });
            $('input[name="payment_type"]').on('focus change',
                function () {
                    var payment_method = $(this),
                        payment_type = payment_method.val();
                    $('.payment-change.active').removeClass('active').children(
                        'input').prop('checked', false).removeAttr(
                        'checked');
                    payment_method.prop('checked', true).parent(
                        'label').addClass('active');
                    //cookie
                    setCookie('payment_type', payment_type);
                    if (payment_type == getCookie('payment_type')) {
                        var token = $('meta[name="_token"]').attr(
                            'content'),
                            order_id = $('.order[data-order_id]').data(
                                'order_id'),
                            url = (order_id) ? '/ajax/order/' + order_id : '/ajax/order',
                            method = (order_id) ? 'PUT' : 'POST',
                            data = {
                                '_token': token,
                                '_method': method,
                                'payment_type': payment_type
                            };//form.serialize();
                        $.ajax({
                            url: url,
                            type: method,
                            data: data,
                            dataType: 'json',
                            success: function (d) {
                                if (d) {
                                    $('#paymentTabs li:eq(1) a').tab(
                                        'show').parent('li').removeClass(
                                        'disabled');
                                    $('.pay_screen').hide();
                                    $('.payment_type-' + payment_type).show();
                                }
                                else {
                                    deleteCookie('payment_type');
                                    alert('Ошибка оплаты');
                                }
                            },
                            error: function (err) {
                                if (err.status == 422) {
                                    alert(JSON.stringify(err.responseJSON));
                                }
                                else alert('Сбой оплаты');
                            }
                        });
                    }
                    else alert('Ошибка предзаказа!');
                });

            //ajax-update-order-yandex

            $('form.ajax-update-order-yandex').on('submit',
                function (e) {

                    var form = $(this), inputs = $('input', form),
                        errors = inputs.size();
                    inputs.each(function () {
                        errors -= $(this).val();
                    });

                    if (!errors) {

                        var token = $('meta[name="_token"]').attr(
                            'content'),
                            order_id = $('input[name="label"]',
                                form).val(),
                            url = (order_id) ? '/ajax/order/' + order_id : '/ajax/order',
                            method = (order_id) ? 'PUT' : 'POST',
                            payment_type = 'ya_' + $(
                                    'input[name="paymentType"]',
                                    form).val().toLowerCase(),
                            name = $('input[name="name"]',
                                form).val(),
                            phone = $('input[name="phone"]',
                                form).val(),
                            email = $('input[name="email"]',
                                form).val(),
                            data = {
                                '_token': token,
                                '_method': method,
                                'payment_type': payment_type,
                                'name': name,
                                'phone': phone,
                                'email': email,
                                '_step': 1
                            };//form.serialize();

                        $.ajax({
                            url: url,
                            type: method,
                            data: data,
                            dataType: 'json',
                            success: function (d) {
                                if (d) {
                                    $('input[name="name"]',
                                        form).remove();
                                    $('input[name="phone"]',
                                        form).remove();
                                    $('input[name="email"]',
                                        form).remove();
                                    return true;
                                }
                                else {
                                    deleteCookie('payment_type');
                                    alert('Ошибка оплаты 2');
                                    e.preventDefault();
                                    return false;
                                }
                            },
                            error: function (err) {
                                if (err.status == 422) {
                                    alert(JSON.stringify(err.responseJSON));
                                }
                                else alert('Сбой оплаты 2');
                                e.preventDefault();
                                return false;
                            }
                        });

                    }
                    else {
                        alert(
                            'Ошибка формы оплаты или заполнены не все поля');
                        e.preventDefault();
                        return false;
                    }

                });

            $('.nav-tabs a[data-toggle=tab]').on('click',
                function (e) {
                    if ($(this).parent('li').hasClass('disabled')) {
                        e.preventDefault();
                        return false;
                    }
                });

            var payModalHash = '#payModal',
                payModal = $(payModalHash);
            if (window.location.hash == payModalHash) {
                payModal.modal('show');
            }

            $('.material-category').click(function (e) {
                $(this).find('.category-materials').toggle();
            });

            $('.material').click(function (e) {
                $(this).find('.material-content').toggle();

                if (!$(this).find('iframe').prop('src')) {
                    $(this).find('iframe').prop('src', function () {
                        return $(this).data('src');
                    });
                }

                return false;
            });

            $('.material-content a').click(function (e) {
                e.stopPropagation();
            });
        })(jQuery);
    </script>
@stop
