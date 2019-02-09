@extends('layouts.frontend.master-canvas')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="BAF Basket | {{getOption('web_title')}}" />
    <meta property="og:description" content="Basket Page {{getOption('web_title')}}" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/british academy of finance Indonesia.jpg" />
    <meta name="description" content="Basket page of {{getOption('web_title')}}" />
@stop
@section('title')
	Course Levels
@stop
@section('content')
<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Levels</h1>
				<span>The Levels of our courses</span>				
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Portfolio Filter
					============================================= -->
					<ul class="portfolio-filter clearfix" data-container="#portfolio">
							<li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
						@foreach($levels as $level)
							<li><a href="#" data-filter=".pf-{{$level->id}}">{{$level->alias}}</a></li>	
						@endforeach					

					</ul><!-- #portfolio-filter end -->

					<div class="clear"></div>

					<!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio grid-container clearfix">
						@foreach($levels as $level)
							@foreach($level->courses as $course)
								<article class="portfolio-item pf-media pf-{{$level->id}}">
									<div class="portfolio-image">
										<a href="{{route('page.course.single',$course->slug)}}">
											<img src="{{$course->thumbnail}}" alt="{{$course->title}}">
										</a>
										<div class="portfolio-overlay">									
											<a href="{{route('page.course.single',$course->slug)}}" class="center-icon"><i class="icon-line-eye"></i></a>
										</div>
									</div>								
								</article>
							@endforeach
						@endforeach

					</div><!-- #portfolio end -->

				</div>

			</div>

		</section><!-- #content end -->
@stop

@section('footer')
	
@stop