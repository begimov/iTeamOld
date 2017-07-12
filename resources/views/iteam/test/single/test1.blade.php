@extends('iteam.template')

@section('title')
    {{--{{ @$page->meta_title ? $page->meta_title . ' ' : (@$page->title ? $page->title . ' ' : '') }}--}}
    {{ @$test->meta_title ? $test->meta_title : '' }}
@stop

@section('meta')
    <meta name="description" content="{{ @$test->meta_description ? $test->meta_description : '' }}">
    <meta name="keywords" content="{{ @$test->meta_keywords ? $test->meta_keywords : '' }}">
@stop

@section('main')
    <div class="row">
        <div id="test-top">
        <h2 class="text-center">{{ $test->name }}</h2>
        </div>
        @if(!$corporation)
            <div id="test-description">
                <p>{!! $test->description !!}</p>
                {{--<a href="{{ route('site.test.order', ['id' => $test->id]) }}">Заказать тест</a>--}}
                {{--<a class="btn btn-default btn-lg" role="button" data-toggle="modal" data-target="#payModal" href="#payModal">Заказать корпоративный тест</a>--}}
            </div>
        @endif
        @if(!$corporation)
            @if($sum != 0)
                <div id="chart_div" class="center-block" style="width: 500px"></div>
            @endif
            {{--<div id="piechart_3d" style="width: 900px; height: 500px;"></div>--}}
            <div style="text-align: center;"><b>Уже прошли тест: {{ $sum }}</b></div>
        @endif
    </div>
    <div class="row" style="margin-top: 30px;">
        <div class="box">
            <ol>
                @if(!$corporation)
                    <form action="{{ route('site.test.result', ['id' => $test->id]) }}" method="POST" id="formtest">
                @else
                    <form action="{{ route('site.test.corporation.result', ['id' => $test->id]) }}" method="POST" id="formCorporationTest">
                @endif
                    {{ csrf_field() }}
                    @php
                        $i = 1;
                    @endphp
                    @if($corporation)
                        <input type="text" class="hidden" name="test_order_id" value="{{ $order->id }}">
                    @endif
                    @foreach($test_questions as $tq)
                        <div style="height: 100%;">
                            <div id="test-question"><li><span id="test-question-span">{{ $tq->name }}</span></li></div>
                            <div id="test-answer">
                                <ul>
                                <li><input type="radio" name="{{ $i }}" value="{{ $tq->weight * 0}}" required>&nbsp;&nbsp;&nbsp;Нет</li>
                                <li><input type="radio" name="{{ $i }}" value="{{ $tq->weight * 1}}" required>&nbsp;&nbsp;&nbsp;Скорее нет</li>
                                <li><input type="radio" name="{{ $i }}" value="{{ $tq->weight * 2}}" required>&nbsp;&nbsp;&nbsp;Нечто среднее</li>
                                <li><input type="radio" name="{{ $i }}" value="{{ $tq->weight * 3}}" required>&nbsp;&nbsp;&nbsp;Скорее да</li>
                                <li><input type="radio" name="{{ $i }}" value="{{ $tq->weight * 4}}" required>&nbsp;&nbsp;&nbsp;Да</li>
                                </ul>
                            </div>
                        </div>
                        <div class="hidden">{{ $i++ }}</div>
                    @endforeach
                    @if(!$corporation)
                        <div id="test-result-btn"><input class="btn" id="test-btn" type="submit" value="Получить результат теста"></div>
                    @else
                        <div id="test-result-btn"><input class="btn" id="test-btn" type="submit" value="Отправить"></div>
                    @endif
                </form>
            </ol>
            {!! session('result') !!}
        </div>
        {{--<script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=Bh5z&webforms_id=5629806"></script>--}}
        <div id="answer"></div>
    </div>

        <!-- modal.order -->
        @include('iteam.modals.order')
        <!-- /modal.order -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            {{--$("#formtest").submit(function (e) {--}}
                {{--e.preventDefault();--}}
                {{--console.log('fsdfsd');--}}
                {{--var data = $(this).serialize();--}}
                {{--$.ajax({--}}
                    {{--url: "{{ route('site.test.result', ['id' => $test->id]) }}",--}}
                    {{--type: "get",--}}
                    {{--data: data,--}}
                    {{--success: function (response) {--}}
                        {{--$("#answer").empty();--}}
                        {{--$("#answer").append(response);--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}

            $("#formCorporationTest").submit(function (e) {
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url: "{{ route('site.test.corporation.result', ['id' => $test->id]) }}",
                    type: "post",
                    data: data,
                    success: function (response) {
                        $("#answer").empty();
                        $("#answer").append(response);
                    }
                });
            });

            $("#formorder label").click(function (e) {
//                e.preventDefault();
                $(this).children('input').prop("checked", true);
                var data = $('#formorder').serialize();
                var act = this;
                $.ajax({
                    url: "{{ route('site.test.order', ['id' => $test->id]) }}",
                    type: "get",
                    data: data,
                    success: function (response) {
                        $("#formorder label").removeClass('active');
                        $(act).addClass('active');
                        $("#payment_method").removeClass('active');
                        $("#checkout").removeClass('disabled');
                        $("#checkout").addClass('active');
                        $("#paymentTabs li:first").removeClass('active');
                        $("#paymentTabs li:last").addClass('active');
                        id = response.payment_type;
                        console.log(id);
                        console.log($("#methods_pay > div"));
                        $("#methods_pay > div").css("display", "none");
                        $("#" + id + "").css("display", "block");

                        var url = "https://iteam.ru/i/order";
                        $(location).attr('href',url);
                    }
                });
            });
        });
    </script>
    {{--<script src="/js/cookie.js"></script>--}}
@stop


