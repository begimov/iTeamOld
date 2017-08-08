@extends('c.template')

@section('title')

@stop

@section('header')

@stop

@section('main')

    <link rel="stylesheet" href="{{ asset('assets/css/assets.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shortcodes.css') }}">

    <link id="theme_css" rel="stylesheet" href="{{ asset('assets/css/light.css') }}">
    <link id="skin_css" rel="stylesheet" href="{{ asset('assets/css/skins/default.css') }}">

    <style>
        .btn, #company_iteam .btn {
            border: 1px solid white;
            border-radius: 0px;
        }
        #count-6 {
            color: white;
        }
    </style>

    <script type="text/javascript">$SA = {s:259314, asynch: 1, useBlacklistUrl: 1};(function() {   var sa = document.createElement("script");   sa.type = "text/javascript";   sa.async = true;   sa.src = ("https:" == document.location.protocol ? "https://" + $SA.s + ".sa" : "http://" + $SA.s + ".a") + ".siteapps.com/" + $SA.s + ".js";   var t = document.getElementsByTagName("script")[0];   t.parentNode.insertBefore(sa, t);})();</script>

    {!! $page->text !!}

    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.12.0.min.js') }}" tppabs="http://it-rays.org/bookra/assets/js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/assets.js') }}" tppabs="http://it-rays.org/bookra/assets/js/assets.js"></script>

    <script type="text/javascript" src="{{ asset('assets/revolution/js/jquery.themepunch.tools.min.js') }}" tppabs="http://it-rays.org/bookra/assets/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/revolution/js/jquery.themepunch.revolution.min.js') }}" tppabs="http://it-rays.org/bookra/assets/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <script type="text/javascript">
        var tpj=jQuery;
        var revapi70;
        tpj(window).load(function() {
            if(tpj("#slider").revolution == undefined){
                revslider_showDoubleJqueryError("#slider");
            }else{
                revapi70 = tpj("#slider").show().revolution({
                    sliderType:"standard",
                    jsFileLocation:"assets/revolution/js/",
                    sliderLayout:"fullwidth",
                    dottedOverlay:"none",
                    delay:9000,
                    navigation: {
                        keyboardNavigation:"off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation:"off",
                        onHoverStop:"off",
                        touch:{
                            touchenabled:"on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                        ,
                        arrows: {
                            style:"zeus",
                            enable:true,
                            hide_onmobile:true,
                            hide_under:600,
                            hide_onleave:true,
                            hide_delay:200,
                            hide_delay_mobile:1200,
                            tmp:'<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                            left: {
                                h_align:"left",
                                v_align:"center",
                                h_offset:30,
                                v_offset:0
                            },
                            right: {
                                h_align:"right",
                                v_align:"center",
                                h_offset:30,
                                v_offset:0
                            }
                        }
                    },
                    responsiveLevels:[1200,1024,768,480],
                    gridwidth:[1200,1024,768,480],
                    gridheight:[600,600,960,720],
                    lazyType:"none",
                    parallax: {
                        type:"mouse+scroll",
                        origo:"slidercenter",
                        speed:2000,
                        levels:[1,2,3,20,25,30,35,40,45,50],
                        disable_onmobile:"on"
                    },
                    shadow:0,
                    spinner:"spinner2",
                    autoHeight:"off",
                    disableProgressBar:"on",
                    hideThumbsOnMobile:"off",
                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    debugMode:false,
                    fallbacks: {
                        simplifyAll:"off",
                        disableFocusListener:false,
                    }
                });
            }
        });
    </script>

    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}" tppabs="http://it-rays.org/bookra/assets/js/script.js"></script>

    <script>
        $('#count-6').countdown('2018/2/5', function(event) {
            var $this = $(this).html(event.strftime(''
                + '<div><span>%m</span> Months</div>'
                + '<div><span>%d</span> Days</div>'
                + '<div><span>%H</span> Hours</div>'
                + '<div><span>%M</span> Minutes</div>'
                + '<div><span>%S</span> Seconds</div>'));
        });
    </script>

    <script>
        $( document ).ready(function() {
            $('.panel').click(function () {
                $(this).children('div').removeClass('in');
            });
        });
    </script>

@stop

@section('footer')

    <!-- modal.learn -->
    {{--@include('c.modals.learn')--}}
    <!-- /modal.learn -->

@stop

@section('edit-link')

@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/locale/ru.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        } );
    </script>

    <script>
        (function($){

            $('.date').each(function(i, e) {
                //var time = moment($(e).data('date'));
                //if(now.diff(time, 'days') <= 1) {
                //	$(e).html(time.from(now));
                //}
                $(e).html(moment($(e).data('date')).calendar());
            });

            function getCookie(name) {
                var matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }

            var learn_s = $('#learn'),
                user_id = learn_s.data('user_id'),
                order_id = learn_s.data('order_id'),
                product_id = learn_s.data('product_id'),
                payment_type = learn_s.data('payment_type') || getCookie('payment_type');

            if(payment_type) {
                var paymentInput = $('input[value="'+payment_type+'"]');
                paymentInput.prop('checked', true).parent('.payment-change').addClass('active');

                if(!user_id) $('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');

            }

            $('.payment-change').click(function(){

                if(!user_id){
                    var labelButton = $(this);
                    $('.payment-change.active').removeClass('active').children('input').prop('checked', false).removeAttr('checked');

                    payment_type = labelButton.addClass('active').children('input').prop('checked', true).val();

                    document.cookie = "payment_type=" + payment_type;
                    $('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');
                }
                else {
                    $(this).parents('form').submit();
                }

            });

            $('.nav-tabs a[data-toggle=tab]').on('click', function(e) {
                if ($(this).parent('li').hasClass('disabled')) {
                    e.preventDefault();
                    return false;
                }
            });


            var payModalHash = '#payModal', payModal = $(payModalHash);
            if(window.location.hash == payModalHash){
                payModal.modal('show');
            }

            function validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
            function validatePassword(password) {
                var re = /^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/;
                return re.test(password);
            }
            function validateUsername(username) {
                //var re = /^[АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюяA-Za-z0-9_-.]{2,32}$/;
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
                confirmation = input.is('[name="password_confirmation"]') ? $('[name="password"]').val() : false,
                    val = input.val(),
                    vallength = val.length;

                if(required && !vallength) {
                    input.attr('data-original-title', (input.data('required-error') || 'Это поле обязательно к заполнению'));
                }
                else ok = 1;

                if(minlength && vallength<minlength) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('minlength-error') || 'Минимальная длина поля: ' +minlength+  ' символов'));
                }
                if(maxlength && vallength>maxlength) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('maxlength-error') || 'Максимальная длина поля: ' +minlength+  ' символов'));
                }
                if(email && !validateEmail(input.val())) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('email-error') || 'Укажите корректный Email-адрес'));
                }
                if(log) {
                    ve = validateUsername(input.val());
                    vu = validateEmail(input.val());
                    if(! (ok = ve || vu) ) input.attr('data-original-title', (input.data('email-error') || (!ve ? 'Укажите корректный Email-адрес или Ваш Логин' : 'Для логина используют только латинские буквы, цифры и _-') ));
                }
                if(password && !validatePassword(input.val())) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('password-error') || 'Допустимые символы: латинские буквы, цифры или знаки _~!@#$%^&*-.'));
                }
                // && val != $('[name="'.input.data('forname').'"]').val()
                if(password && confirmation && val!=confirmation) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('confirmation-error') || 'Пароли не совпадают'));
                }
                return ok;
            }

            $('input[data-toggle="tooltip"]').on('focus',function(){
                $(this).tooltip('show');
            });

            $('form.validate input').on('change paste', function(e) {
                var input = $(this), ok = validateInput(input), tt = input.is('[data-toggle="tooltip"]');
                if(!ok){
                    input.parent().removeClass('has-success').addClass('has-error');
                    if(tt) input.tooltip('show');
                }
                else {
                    input.parent().removeClass('has-error').addClass('has-success');
                    if(tt) input.tooltip('hide');
                }
            });

            $('form.validate').on('submit', function(e) {

                var form = $(this), errors = 0;
                if(form.not('.is-valid')) {

                    var inputs = $('input[required]',form), errors = inputs.size();
                    var vallength = 0;

                    inputs.each(function(){
                        var input = $(this),
                            ok = validateInput(input);
                        errors -= ok;
                    });

                    if(!errors){

                        $('input[name="_redirect"]',form).val('https://iteam.ru/i/order/create?email='+$('input[name="email"]',form).val()+'&name='+$('input[name="firstname"]',form).val()+'&phone='+$('input[name="phone"]',form).val()+'&product_id='+product_id+'&payment_type='+payment_type);
                        form.addClass('is-valid').submit();

                    }
                    else {
                        inputs.parent().addClass('has-error');
                        inputs.tooltip('show');
                        e.preventDefault();
                        return false;
                    }

                }

            });

            $('.show-password').on('click',function(){
                var showPassword = $(this);
                if(showPassword.is('.glyphicon-eye-open')) {
                    showPassword.removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').parent('.input-group-addon').prev('input').attr('type','text');
                }
                else {
                    showPassword.removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').parent('.input-group-addon').prev('input').attr('type','password');
                }
            });


        })(jQuery);
    </script>

@stop

@section('footer')

    <!-- modal.learn -->
    {{--@include('c.modals.learn')--}}
    <!-- /modal.learn -->

@stop

@section('edit-link')

@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/locale/ru.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        } );
    </script>

    <script>
        (function($){

            $('.date').each(function(i, e) {
                //var time = moment($(e).data('date'));
                //if(now.diff(time, 'days') <= 1) {
                //	$(e).html(time.from(now));
                //}
                $(e).html(moment($(e).data('date')).calendar());
            });

            function getCookie(name) {
                var matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }

            var learn_s = $('#learn'),
                user_id = learn_s.data('user_id'),
                order_id = learn_s.data('order_id'),
                product_id = learn_s.data('product_id'),
                payment_type = learn_s.data('payment_type') || getCookie('payment_type');

            if(payment_type) {
                var paymentInput = $('input[value="'+payment_type+'"]');
                paymentInput.prop('checked', true).parent('.payment-change').addClass('active');

                if(!user_id) $('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');

            }

            $('.payment-change').click(function(){

                if(!user_id){
                    var labelButton = $(this);
                    $('.payment-change.active').removeClass('active').children('input').prop('checked', false).removeAttr('checked');

                    payment_type = labelButton.addClass('active').children('input').prop('checked', true).val();

                    document.cookie = "payment_type=" + payment_type;
                    $('#paymentTabs li:eq(1) a').tab('show').parent('li').removeClass('disabled');
                }
                else {
                    $(this).parents('form').submit();
                }

            });

            $('.nav-tabs a[data-toggle=tab]').on('click', function(e) {
                if ($(this).parent('li').hasClass('disabled')) {
                    e.preventDefault();
                    return false;
                }
            });


            var payModalHash = '#payModal', payModal = $(payModalHash);
            if(window.location.hash == payModalHash){
                payModal.modal('show');
            }

            function validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
            function validatePassword(password) {
                var re = /^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/;
                return re.test(password);
            }
            function validateUsername(username) {
                //var re = /^[АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюяA-Za-z0-9_-.]{2,32}$/;
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
                confirmation = input.is('[name="password_confirmation"]') ? $('[name="password"]').val() : false,
                    val = input.val(),
                    vallength = val.length;

                if(required && !vallength) {
                    input.attr('data-original-title', (input.data('required-error') || 'Это поле обязательно к заполнению'));
                }
                else ok = 1;

                if(minlength && vallength<minlength) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('minlength-error') || 'Минимальная длина поля: ' +minlength+  ' символов'));
                }
                if(maxlength && vallength>maxlength) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('maxlength-error') || 'Максимальная длина поля: ' +minlength+  ' символов'));
                }
                if(email && !validateEmail(input.val())) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('email-error') || 'Укажите корректный Email-адрес'));
                }
                if(log) {
                    ve = validateUsername(input.val());
                    vu = validateEmail(input.val());
                    if(! (ok = ve || vu) ) input.attr('data-original-title', (input.data('email-error') || (!ve ? 'Укажите корректный Email-адрес или Ваш Логин' : 'Для логина используют только латинские буквы, цифры и _-') ));
                }
                if(password && !validatePassword(input.val())) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('password-error') || 'Допустимые символы: латинские буквы, цифры или знаки _~!@#$%^&*-.'));
                }
                // && val != $('[name="'.input.data('forname').'"]').val()
                if(password && confirmation && val!=confirmation) {
                    ok = 0;
                    input.attr('data-original-title', (input.data('confirmation-error') || 'Пароли не совпадают'));
                }
                return ok;
            }

            $('input[data-toggle="tooltip"]').on('focus',function(){
                $(this).tooltip('show');
            });

            $('form.validate input').on('change paste', function(e) {
                var input = $(this), ok = validateInput(input), tt = input.is('[data-toggle="tooltip"]');
                if(!ok){
                    input.parent().removeClass('has-success').addClass('has-error');
                    if(tt) input.tooltip('show');
                }
                else {
                    input.parent().removeClass('has-error').addClass('has-success');
                    if(tt) input.tooltip('hide');
                }
            });

            $('form.validate').on('submit', function(e) {

                var form = $(this), errors = 0;
                if(form.not('.is-valid')) {

                    var inputs = $('input[required]',form), errors = inputs.size();
                    var vallength = 0;

                    inputs.each(function(){
                        var input = $(this),
                            ok = validateInput(input);
                        errors -= ok;
                    });

                    if(!errors){

                        $('input[name="_redirect"]',form).val('https://iteam.ru/i/order/create?email='+$('input[name="email"]',form).val()+'&name='+$('input[name="firstname"]',form).val()+'&phone='+$('input[name="phone"]',form).val()+'&product_id='+product_id+'&payment_type='+payment_type);
                        form.addClass('is-valid').submit();

                    }
                    else {
                        inputs.parent().addClass('has-error');
                        inputs.tooltip('show');
                        e.preventDefault();
                        return false;
                    }

                }

            });

            $('.show-password').on('click',function(){
                var showPassword = $(this);
                if(showPassword.is('.glyphicon-eye-open')) {
                    showPassword.removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').parent('.input-group-addon').prev('input').attr('type','text');
                }
                else {
                    showPassword.removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').parent('.input-group-addon').prev('input').attr('type','password');
                }
            });


        })(jQuery);
    </script>
@stop