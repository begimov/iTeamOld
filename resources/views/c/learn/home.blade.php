@extends('c.template')


@section('title')
    {{ $page->meta_title ? $page->meta_title . ' ' : ($page->title ? $page->title . ' ' : '') }}
    |
@stop

@section('header')

    <!-- Header -->
    <header class="learn-header">

    <!-- <h1 class="learn-header-title">{!! $page->title !!}</h1> -->
        <div style="width:100%; background-color:#6A0101; color:#fff;padding:1em;">
            <h1 class="learn-header-title" style="margin-top:-1em;"><img
                        src="/filemanager/userfiles/user0/icons/title-mk.png"/> Мастер-классы / Мастер-проекты / Кейсы
            </h1>
        </div>
        <br/>

        <div style="width:100%;margin:0 auto;background-color:#ddd;">
            <p style="width:66%;margin:0 auto;font-size:1.2em;padding:1em;font-weight:bold;">
                На этой странице нашего сайта мы представляем обзор всех <br/>информационных
                материалов, созданных нами для управленцев</p>
            <table style="width:50%;margin:0 auto;">
                <tr>
                    <td><a href="https://iteam.ru/learn/webinar"><img
                                    src="/filemanager/userfiles/user0/icons/book/webinar-icon.png"/></a></td>
                    <td><a href="https://iteam.ru/learn/course"><img
                                    src="/filemanager/userfiles/user0/icons/book/course-icon.png"/></a></td>
                    <td><a href="https://iteam.ru/learn/breakfast"><img
                                    src="/filemanager/userfiles/user0/icons/book/coffee-cup.png"/></a></td>
                </tr>
                <tr>
                    <td><a style="color:#333333;font-weight:bold;"
                           href="https://iteam.ru/learn/webinar">МАСТЕР-КЛАССЫ</a></td>
                    <td><a style="color:#333333;font-weight:bold;"
                           href="https://iteam.ru/learn/course">МАСТЕР-ПРОЕКТЫ</a></td>
                    <td><a style="color:#333333;font-weight:bold;" href="https://iteam.ru/learn/breakfast">КЕЙСЫ</a>
                    </td>
                </tr>
            </table>
        </div>

    </header>

@stop

@section('main')

    <section class="content">
        <div class="container">


            @if(Request::segment(1))
                <div class="row">
                    <div class="box">
                        <div class="col-lg-12">

                        <!-- 	{!! HTML::shortCode($page->text) !!} -->

                        </div>

                    </div>
                </div>
            @endif

            @if($childrens)
                <br class="temp-correct">
                <div class="row media_list">
                    <div class="col-lg-10 col-lg-offset-1">
                        @foreach($childrens as $child)

                            <div class="media">

                                @if($child->img)
                                    <div class="media-left media-middle">
                                        <a href="{!! '/learn' . $child->path . $child->wid !!}">
                                            <img class="media-object" src="{!! $child->img !!}"
                                                 alt="{!! $child->title !!}">
                                        </a>
                                    </div>
                                @endif

                                <div class="media-body">
                                    <h4 class="media-heading"
                                        style="width:945px; background-color:#ddd; padding:20px;border-radius:7px;margin:0;">
                                        <img class="pics-mk"
                                             src="/filemanager/userfiles/user0/content/title-mk1-small.png"
                                             style="border-right:2px solid #666; padding-right:20px;margin-right:20px;"/>

                                        {!! link_to('learn' . $child->path . $child->wid, $child->title) !!}</h4>
                                    <div class="intro">{!! @$child->intro !!}</div>
                                </div>

                                @if(!$child->children)
                                    <div class="media-right media-middle text-right">
							<span class="media-object">

								{{--<span class="nowrap">--}}
                                {{--{!! $child->price>0 ? HTML::priceFormatHtml(@$child->price, $child->currensy) : 'Бесплатно' !!}--}}
                                {{--</span>--}}

                                @if($child->published_at > date('Y-m-d H:i:s'))
                                    <small class="nowrap">
									<span class="glyphicon glyphicon-time"></span>
									&nbsp; <span class="date" data-date="{!! $child->published_at !!}">
										{!! HTML::humanDateFormat($child->published_at) !!}
									</span>
								</small>
                                @endif

							</span>
                                    </div>

                                    {{--<div class="media-right media-middle sm-hidden text-right">--}}
                                    {{--<a href="{!! '/learn' . $child->path . $child->wid !!}" class="media-object btn">Подробнее</a>--}}
                                    {{--</div>--}}
                                @endif

                            </div>
                            <!-- <hr> -->

                        @endforeach
                    </div>
                </div>
                {!! $childrens->links() !!}
            @endif

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


        })(jQuery);
    </script>
@stop