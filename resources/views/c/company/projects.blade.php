@extends('c.template')

@section('header')
	
	    <!-- Header -->
    <header class="copage-header" id="top_{{ Request::segment(2) }}">
	
		<div class="-row">
			<ol class="breadcrumb">
				<li>{!! link_to('/company', 'Компания iTeam', ["class"=>"crumb_parent crumb_0"]) !!} </li>
			</ol>
		</div>
		
		<h1>Проекты</h1>
		
        </div>
	
    </header>
	
@stop

@section('main')
    <section class="content">
		<div class="container">
		    <div style="border-left:15px solid #6A0101; margin-top:20px;margin-bottom:10px;width:100%; height:70px; background-color:#ccc; text-align:center; font-size:36px;color:#fff;font-weight:bold !important;line-height:70px;text-transform:uppercase !important;">проекты iteam</div>
		    <div style="width:100%; margin-bottom:30px;">
					<div style="width:50%;display:inline-block;background-color:#6A81A1;border-right:2px solid #fff;height:30px;text-align:center; font-size:20px;color:#fff;font-weight:bold !important;line-height:30px;">Компания</div>
					<div style="width:50%;display:inline-block;background-color:#6A81A1; float:right;border-left:2px solid #fff;height:30px;text-align:center; font-size:20px;color:#fff;font-weight:bold !important;line-height:30px;">Проекты</div>
					</div>
			<div class="row projects">
				
				@if($projects)
				<div class="col-lg-10 col-lg-offset-1">
					
					@foreach($projects as $project)
					
						@if($project->company)
							
						<div class="row project" style="border-bottom:1px solid #6A81A1 !important;;">
							<div class="col-sm-6 col-md-6 col-lg-6">
									<div class="thumbnail">
										<h3 style="text-align:center;color:#6A0101;font-weight:bolder !important;font-size:18px;">
											@if($project->company->company_prefix)
												{{ $project->company->company_prefix . ' ' }}
											@endif
											
											&laquo;{!! $project->company->company_name !!}&raquo;
										</h3>
										@if($project->company->company_postfix)
											<p class="text-center"><i>{{ $project->company->company_postfix }}</i></p>
										@endif
										
										@if($project->company->company_logo_small)
											<img src="{!! $project->company->company_logo_small !!}" alt="...">
										@endif
										
										<div class="caption text-center">
											@if($project->company->company_info)
											<p style="font-weight:bold !important;">{!! $project->company->company_info !!}</p>
											@endif
											@if($project->company->company_url)
											<p><a style="color:#6A81A1;" href="{!! $project->company->company_url !!}" target="_blank" rel="nofollow" class="link before-glyphicon glyphicon-new-window">{!! $project->company->company_url !!}</a></p>
											@endif
										</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="project_info">{!! $project->project_info !!}</div>
								@if(0 && $project->news_list)
									<h5 class="text-center">Пресс-релизы<h5>
									<div class="news_list">{!! $project->news_list !!}</div>
								@endif
							</div>
						
						
						</div>
						
						@endif
						
					@endforeach
					

					
				</div>
			
				{!! $projects->links() !!}
				@endif

			</div>
		</div>
	</section>

@stop