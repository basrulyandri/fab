@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="Testimonials |{{getOption('web_title')}}" />
    <meta property="og:description" content="The Testimonials from students who have pass CIMA exams with {{getOption('web_title')}}" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/british academy of finance Indonesia.jpg" />
    <meta name="description" content="The Testimonials from students who have pass CIMA exams with {{getOption('web_title')}}" />
@stop
@section('content')
@section('title')
	Testimonals
@stop
<div class="main">
	<div class="container">
		<div class="row">
			<div class="page-header">
				<h1>Testimonials</h1>
			</div>

			<div class="page">							
				<div class="carousel">
					@foreach($testimonials->chunk(2) as $testimonial)
					<div class="row-fluid" style="border-bottom: 1px solid #ddd; margin-bottom: 20px;">
						@foreach($testimonial as $testi)
						<div class="span6" style="margin-bottom: 20px;">
							<div class="testimonial">
								{!!$testi->body!!}
							</div>
							<div class="media">
								<div class="media-left d-flex mr-3"><img src="{{$testi->thumbnail}}" alt=""></div>
								<div class="media-body">
									<div class="overview">
										<div class="name"><strong>{{$testi->name}}</strong></div>
										<div class="details">{{$testi->position_title}}</div>
										<div class="star-rating">{{$testi->course}}</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
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