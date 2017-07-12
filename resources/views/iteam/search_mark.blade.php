@extends('iteam.template_no_fb')

@section('title')
    {{ 'Поиск' }}
@stop

@section('main')

    <div class="container search">

        <h5 class="title">Результат поиска по метке: <i>"{{ isset($mark) ? $mark->name : '' }}"</i></h5>

        <div class="media_list" style="margin-top: 50px">
            @if(count($marks) > 0)
                @foreach($marks as $mark)
                    <div class="box list_item">
                        <div class="list_item_img" style="display:none;">
                        </div>
                        <div class="list_item_body">
                            @if($mark->type_resource == 1)
                                <div class="list_item_preinfo">
                                    @if($mark->article->author)
                                        <div class="list_item_author"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; {!! $mark->article->author !!}</div>
                                        <div class="list_item_parent"><a href="{!! $mark->article->path !!}"><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> &nbsp; {!! $mark->article->parent->title !!}</a></div>
                                    @endif
                                </div>
                                <h4 class="list_item_title">
                                    {!! link_to($mark->article->path . @$mark->article->wid, $mark->article->title) !!}
                                </h4>
                                <div class="list_item_text">
                                    <div class="intro">{!! @$mark->article->intro !!}</div>
                                </div>
                                <div class="list_item_info">
                                    <div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($mark->article->created_at)) }}</time></div>
                                    <div class="list_item_viewed"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp; {!! $mark->article->viewed !!}</div>
                                </div>
                            @elseif($mark->type_resource == 2)
                                <div class="list_item_preinfo">
                                    <div class="list_item_parent"><a href="https://iteam.ru/news"><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> &nbsp; Новости</a></div>
                                </div>
                                <h4 class="list_item_title">
                                    {!! link_to('news/' . @$mark->news->wid, $mark->news->title) !!}
                                </h4>
                                <div class="list_item_text">
                                    <div class="intro">{!! @$mark->news->intro !!}</div>
                                </div>
                                <div class="list_item_info">
                                    <div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($mark->news->created_at)) }}</time></div>
                                    @if(isset($mark->learn->viewed))
                                        <div class="list_item_viewed"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp; {!! $mark->news->viewed !!}</div>
                                    @endif
                                </div>
                            @elseif($mark->type_resource == 3)
                                <div class="list_item_preinfo">
                                    <div class="list_item_author"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; {!! ($mark->learn->author != 0) ? $mark->learn->author : '' !!}</div>
                                    @if($mark->learn->author)
                                        <div class="list_item_parent"><a href="{!! $mark->learn->path !!}"><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> &nbsp; {!! $mark->learn->parent->title !!}</a></div>
                                    @endif
                                </div>
                                <h4 class="list_item_title">
                                    {!! link_to('learn' . $mark->learn->path . @$mark->learn->wid, $mark->learn->title) !!}
                                </h4>
                                <div class="list_item_text">
                                    <div class="intro">{!! @$mark->learn->intro !!}</div>
                                </div>
                                <div class="list_item_info">
                                    <div class="list_item_date"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp; <time data-nowd="{{ date("d.m.Y") }}" data-nowt="{{ date("H:i:s") }}">{{ date("d.m.Y H:i", strtotime($mark->learn->created_at)) }}</time></div>
                                    @if(isset($mark->learn->viewed))
                                        <div class="list_item_viewed"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp; {!! $mark->learn->viewed !!}</div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                <?php echo $marks->render(); ?>
            @else
                <p>
                    Ничего не найдено
                </p>
            @endif
        </div>
    </div>

@stop