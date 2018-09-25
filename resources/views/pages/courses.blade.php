@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="BAF Basket | {{getOption('web_title')}}" />
    <meta property="og:description" content="Basket Page {{getOption('web_title')}}" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/british academy of finance Indonesia.jpg" />
    <meta name="description" content="Basket page of {{getOption('web_title')}}" />
@stop
@section('content')
@section('title')
	Basket
@stop
<div class="main">
	<div class="container">
		<div class="row">			
			<div class="span8">			
				<!-- Content -->
				<div class="content">					
					<div class="page">	
					@foreach($levels as $level)
						<div class="page-header">
							<h2><i class="icon-play-circle"></i> {{$level->title}}</h2>
						</div>

						<section id="videos">
								<div class="videos">									
									<div class="row">
										@foreach($level->courses as $course)
										<div class="span2">
											<div class="item">
												<a href="{{route('page.course.single',$course->slug)}}">
													<figure>
														<img src="{{$course->thumbnail}}" alt="{{$course->title}}">
														<span class="video-icon">
															<i class="icon-eye-open"></i>
														</span>
													</figure>
												</a>
												<a href="{{route('page.course.single',$course->slug)}}"><h5>{{$course->title}}</h5></a>
											</div>
										</div>	
										@endforeach								
									
									</div>									
								</div>
							</section>
					@endforeach
					</div>
				</div>
			</div>

			<div class="span4">
				<div class="page-header">
						<h1>Testimonials</h1>
					</div>
				<div class="carousel">				
					
						@foreach($testimonials as $testi)
						<div class="span3" style="margin-bottom: 20px;border-bottom: 1px solid #ddd;">
							<div class="testimonial">
								{!!$testi->body!!}
							</div>
							<div class="media">
								<div class="media-left d-flex mr-3"><img src="{{$testi->thumbnail}}" alt=""></div>
								<div class="media-body">
									<div class="overview">
										<div class="name"><strong>{{$testi->name}}</strong></div>
										<div class="details"><b>{{$testi->position_title}}</b></div>
										<div class="star-rating">{{$testi->course}}</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach					
					
				</div>
			</div>		
		</div>
	</div>
</div>
@stop

@section('footer')
	
@stop