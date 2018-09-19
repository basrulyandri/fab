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
				<div class="span8">			
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
					<div class="price-column @if($price->student_type == 'new') bg-warning @else bg-info @endif @if($loop->last) last @endif">
						<ul class="unstyled">							
							<li class="row-title">
								<h3>{{$price->studentType()}} Student</h3>
							</li>
							<li class="row-price">
								<h3>{{toRp($price->amount_idr)}} <small>{{$price->paymentScheme()}}</small></h3>
							</li>
							<li style="min-height: 200px;">{!!$price->notes!!}</li>
							<li class="row-button"><button price-id="{{$price->id}}" class="btn btn-danger add-to-cart">Add To Basket</button></li>
						</ul>
					</div>
					@endforeach				
				</div>
													
				</div>
				<!-- End Content -->
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
	<script>
jQuery(function($) {
	$(document).ready(function(){
		$('.add-to-cart').click(function(){			
			var btn = $(this);
			btn.html('<i class="fa fa-circle-o-notch fa-spin"></i> ...process');			
			var price_id = btn.attr('price-id');
			var _token = '{{Session::token()}}';
			$.ajax({
			  type: "POST",
			  url: "{{route('ajax.post.addtocart')}}",
			  data: { price_id : price_id, _token:_token },
			}).success(function(data){
				$('#cartInfo').text(data['cart'].totalQty);
				btn.html('Add To Basket');
				toastr.success('Success','Course has been added to yor basket.');
				console.log(data['cart'].totalQty);
			});
		});
	});
});
</script>
@stop