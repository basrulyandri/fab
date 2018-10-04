@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{$course->title}} | {{getOption('web_title')}}" />
    <meta property="og:description" content="{{$course->excerpt}}" />
    <meta property="og:image" content="{{url('/')}}{{$course->thumbnail}}" />
    <meta name="description" content="{{$course->excerpt}}" />
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
								<h3>{{toRp($price->amount_idr)}} <small style="color:#8b0000;font-weight: bold;">{{$price->paymentScheme()}}</small></h3>
							</li>
							<li style="min-height: 200px;">{!!$price->notes!!}</li>
							<li class="row-button"><button price-id="{{$price->id}}" class="btn btn-danger add-to-cart">Add To Basket</button></li>
						</ul>
					</div>
					@endforeach				
				</div>
					<p style="text-align: justify;">The first step would be to register @ The British Academy of Finance (BAF)  to follow CIMA by paying the course fee. Students will be guided and supported by the management of BAF on the CIMA-UK registration process which will be informed ahead.</p>
					<p style="text-align: justify;">This comprehensive package makes learning convenient and reliable. It has been designed in such a way that the student has ample access to information and time to get feedback from the tutor. It consists of the following three elements.</p>

					<h3>1. Study Material (Power point presentations and Videos)</h3>
					<p>A collection of comprehensive study material will be made available to you as a guide.</p>
					<h3>2. On-line Tutoring- (20 Hours) </h3>
					<p>This will cover twenty hours of online tutoring during which, you will get to clarify your doubts from the tutor. Lecture times can be arranged according to your convenience ( Please refer class schedule) .</p>

					<h3>3. Revision Questions</h3>
					<p>The revision question pack provided via this package aims at testing your knowledge and to train you to provide accurate answers efficiently.</p>
								
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
			btn.html('<i class="fa icon-refresh icon-spin"></i> ...process');			
			var price_id = btn.attr('price-id');
			var _token = '{{Session::token()}}';
			$.ajax({
			  type: "POST",
			  url: "{{route('ajax.post.addtocart')}}",
			  data: { price_id : price_id, _token:_token },
			}).success(function(data){
				$('#cartInfo').text(data['cart'].totalQty);
				btn.html('Added to Basket');
				$('.add-to-cart').removeClass('disabled');
				btn.addClass('disabled');
				toastr.success('Success','Course has been added to yor basket.');
				console.log(data['cart'].totalQty);
			});
		});
	});
});
</script>
@stop