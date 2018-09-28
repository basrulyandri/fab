@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{$level->title}} | {{getOption('web_title')}}" />
    <meta property="og:description" content="{{$level->excerpt}}" />
    <meta property="og:image" content="{{url('/')}}{{$level->thumbnail}}" />
    <meta name="description" content="{{$level->excerpt}}" />
@stop
@section('content')
@section('title')
	Level {{$level->title}}
@stop
<div class="main">
	<div class="container">
		<div class="row">			
				<div class="span12">			
				<!-- Content -->
				<div class="content">
					<div class="page-header">
						<h1>{{$level->trans('title')}}</h1>
					</div>
					<!-- Single Page -->
					<div class="page">
						
						{!!$level->trans('description')!!}
					</div>
					<!-- End Single Page -->
					<div class="page-header">
						<h2><i class="icon-file-alt"></i> <span>Courses</span></h2>
					</div>
					<section>
								<div id="upcoming-jcarousel" class="upcoming-jcarousel jcarousel" data-auto="5">
									<ul class="events unstyled">
										@foreach($level->courses as $course)
										<li>
											<article>
												<figure>													
													<a href="{{route('page.course.single',$course->slug)}}"><img src="{{url('/')}}{{$course->thumbnail}}" alt=""></a>
												</figure>												
												<div class="body">
													<h4><a href="{{route('page.course.single',$course->slug)}}">{{$course->trans('title')}}</a></h4>
													<p>{{$course->trans('excerpt')}}.</p>
													<div class="more">
														<a href="{{route('page.course.single',$course->slug)}}" class="btn btn-xs btn-danger">Read more</a>
													</div>
												</div>
											</article>
										</li>
										@endforeach
									</ul>									
								</div>
							</section>
				</div>
				<!-- End Content -->
			</div>			
		</div>
	</div>
</div>
@stop

@section('footer')

@stop