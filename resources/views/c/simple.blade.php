@extends('c.template_no_fb')


@section('main')

    <section class="content">
		<div class="container">


			@if(@$content)
			<div class="row">
				<div class="box">
					<div class="col-lg-12">
						<p>{!! $content !!}</p>
					</div>
				</div>
			</div>
			@endif	


		</div>
	</section>

@stop