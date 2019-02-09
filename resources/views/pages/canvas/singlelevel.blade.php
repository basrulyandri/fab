@extends('layouts.frontend.master-canvas')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{$level->title}} | {{getOption('web_title')}}" />
    <meta property="og:description" content="{{$level->excerpt}}" />
    <meta property="og:image" content="{{url('/')}}{{$level->thumbnail}}" />
    <meta name="description" content="{{$level->excerpt}}" />
@stop
@section('content')
@section('title')
	Level {{$level->trans('title')}}
@stop
<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>{{$level->trans('title')}}</h1>								
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
					<div class="single-post nobottommargin">

						<!-- Single Post
						============================================= -->
						<div class="entry clearfix">
							
							<div class="entry-content notopmargin">

								{!!$level->trans('description')!!}

								
								
								
							<h3>Courses</h3>				

							<div class="clear"></div>

							<!-- Portfolio Items
							============================================= -->
							<div id="portfolio" class="portfolio grid-container clearfix">
								@foreach($level->courses as $course)
								<article class="portfolio-item pf-media pf-icons">
									<div class="portfolio-image">
										<a href="{{route('page.course.single',$course->slug)}}">
											<img src="{{$course->thumbnail}}" alt="{{$course->title}}">
										</a>
										<div class="portfolio-overlay">									
											<a href="{{route('page.course.single',$course->slug)}}" class="center-icon"><i class="icon-line-eye"></i></a>
										</div>
									</div>
									<div class="portfolio-desc">
										<h3><a href="portfolio-single.html">{{$course->title}}</a></h3>
										<span><a href="#">Media</a>, <a href="#">Icons</a></span>
									</div>
								</article>
								@endforeach
							</div><!-- #portfolio end -->
									</div>
								</div><!-- .entry end -->

							</div>
							<!-- Portfolio Filter
							============================================= -->
					
					<div class="si-share noborder clearfix">
						<span>Share this Post:</span>
						<div>
							<a href="#" class="social-icon si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
							<a href="#" class="social-icon si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>
							<a href="#" class="social-icon si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>
							<a href="#" class="social-icon si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>
							<a href="#" class="social-icon si-borderless si-rss">
								<i class="icon-rss"></i>
								<i class="icon-rss"></i>
							</a>
							<a href="#" class="social-icon si-borderless si-email3">
								<i class="icon-email3"></i>
								<i class="icon-email3"></i>
							</a>
						</div>
					</div><!-- Post Single - Share End -->
				</div>

			</div>

		</section><!-- #content end -->
@stop

@section('footer')

@stop