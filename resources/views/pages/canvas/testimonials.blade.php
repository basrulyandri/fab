@extends('layouts.frontend.master-canvas')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="Testimonials |{{getOption('web_title')}}" />
    <meta property="og:description" content="The Testimonials from students who have pass CIMA exams with {{getOption('web_title')}}" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/british academy of finance Indonesia.jpg" />
    <meta name="description" content="The Testimonials from students who have pass CIMA exams with {{getOption('web_title')}}" />
@stop
@section('title')
	Testimonals
@stop

@section('content')

<section id="page-title">
	<div class="container clearfix">
		<h1><h1>{{trans('app.testimonials')}}</h1></h1>		
	</div>
</section>

<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<ul class="testimonials-grid clearfix">
				@foreach($testimonials as $testi)
				<li>
					<div class="testimonial">
						<div class="testi-image">
							<a href="#"><img src="{{$testi->thumbnail}}" alt="Customer Testimonails"></a>
						</div>
						<div class="testi-content">
							{!!$testi->body!!}
							<div class="testi-meta">
								{{$testi->name}}
								<span>{{$testi->position_title}}</span>
							</div>
						</div>
					</div>
				</li>	
				@endforeach					
			</ul>
		</div>
	</div>
</section>
@stop

@section('footer')

@stop