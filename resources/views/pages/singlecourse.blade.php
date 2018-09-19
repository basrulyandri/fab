@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{$course->title}} | {{getOption('web_title')}}" />
    <meta property="og:description" content="{{$course->description}}" />
    <meta property="og:image" content="{{url('/')}}{{$course->thumbnail}}" />
    <meta name="description" content="{{$course->description}}" />
@stop
@section('content')
@section('title')
	Course {{$course->title}}
@stop
<div class="main">
	<div class="container">
		<div class="row">			
				<div class="span12">			
				<!-- Content -->
				<div class="content">
					<div class="page-header">
						<h1>{{$course->trans('title')}}</h1>
					</div>
					<!-- Single Page -->
					<div class="page">
						
						{!!$course->trans('description')!!}
					</div>
					<!-- End Single Page -->
					<h2>{{$course->title}} Course Fees:</h2>					

				  <div class="prices">
				  	@foreach($course->prices()->orderBy('student_type')->get() as $price)				  	
					<div class="price-column @if($loop->last) last @endif">
						<ul class="unstyled">							
							<li class="row-title">
								<h3>{{$price->studentType()}} Student</h3>
							</li>
							<li class="row-price">
								<h3>{{toRp($price->amount_idr)}} <small>{{$price->paymentScheme()}}</small></h3>
							</li>
							<li style="min-height: 200px;">{!!$price->notes!!}</li>
							<li class="row-button"><a href="#" class="btn btn-danger btn-large">Add To Basket</a></li>
						</ul>
					</div>
					@endforeach				
				</div>
													
				</div>
				<!-- End Content -->
			</div>			
		</div>
	</div>
</div>
@stop

@section('footer')

@stop