@extends('front.template')

@section('main')

    <div class="row">

        <div class="col-lg-12">
            {!! Form::open(['url' => 'blog/search', 'method' => 'get', 'role' => 'form', 'class' => 'pull-right']) !!}  
                {!! Form::control('text', 12, 'search', $errors, null, null, null, trans('front/blog.search')) !!}
            {!! Form::close() !!}
        </div>

    </div>

    <div class="row">

        @foreach($posts as $post)
            <div class="box">
                <div class="col-lg-12 text-center">
                    <h2>
					{!! link_to('~/' . $post->slug, $post->title) !!}
					</h2>
                </div>
                <div class="col-lg-12">
                    <p>{!! @$post->summary !!}</p>
                </div>
                <div class="col-lg-12 text-center">
                    <!--{ !! link_to('blog/' . $post->slug, trans('front/blog.button'), ['class' => 'btn btn-default btn-lg']) !! }-->
                    <hr>
                </div>
            </div>
        @endforeach
     
        <div class="col-lg-12 text-center">
            <!--{ !! $links !! }-->
        </div>

    </div>

@stop

