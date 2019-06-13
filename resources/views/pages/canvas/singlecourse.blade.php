@extends('layouts.frontend.master-canvas')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{$course->title}} | {{getOption('web_title')}}" />
    <meta property="og:description" content="{{$course->excerpt}}" />
    <meta property="og:image" content="{{url('/')}}{{$course->thumbnail}}" />
    <meta name="description" content="{{$course->excerpt}}" />
@stop
@section('title')
	Course {{$course->title}}
@stop
@section('content')
<section id="page-title">

			<div class="container clearfix">
				<h1>{{$course->trans('title')}}</h1>								
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
					<div class="postcontent nobottommargin clearfix">
						<div class="single-post nobottommargin">
							<div class="entry clearfix">								
								<div class="entry notopmargin">
									{!!$course->trans('description')!!}									
								</div>																
							</div><!-- .entry end -->
						</div>						
						<h4>{{$course->title}} Course Fees:</h4>
						<div class="row pricing bottommargin clearfix">
						@foreach($course->prices()->orderBy('student_type')->get() as $price)
						<div class="col-lg-3">

							<div class="pricing-box">
								<div class="pricing-title">
									<h4>{{$price->studentType()}} Student</h4>
								</div>
								<div class="pricing-price" style="padding: 5px 0;">
									<h4 style="margin-bottom: 5px;">Contact Us</h4>
									<h5 style="color:#8b0000;font-weight: bold;">{{$price->paymentScheme()}}</h5>									
								</div>
								<div class="pricing-features" style="min-height: 210px;{{$loop->index % 2 == 0 ? 'padding:20px;' : ''}}">

									{!!str_replace('ol','ul',$price->notes)!!}
								</div>
								<div class="pricing-action">
									<button price-id="{{$price->id}}" class="btn btn-danger add-to-cart">Add To Basket</button>
								</div>
							</div>

						</div>
						@endforeach

					</div>
					<p style="text-align: justify;">The first step would be to register @ The British Academy of Finance (BAF)  to follow CIMA by paying the course fee. Students will be guided and supported by the management of BAF on the CIMA-UK registration process which will be informed ahead.</p>
					<p style="text-align: justify;">This comprehensive package makes learning convenient and reliable. It has been designed in such a way that the student has ample access to information and time to get feedback from the tutor. It consists of the following three elements.</p>

					<h5>1. Study Material (Power point presentations and Videos)</h5>
					<p>A collection of comprehensive study material will be made available to you as a guide.</p>
					<h5>2. On-line Tutoring- (20 Hours) </h5>
					<p>This will cover twenty hours of online tutoring during which, you will get to clarify your doubts from the tutor. Lecture times can be arranged according to your convenience ( Please refer class schedule) .</p>

					<h5>3. Revision Questions</h5>
					<p>The revision question pack provided via this package aims at testing your knowledge and to train you to provide accurate answers efficiently.</p>
					
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
					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">
							<div class="widget widget-twitter-feed clearfix">
							<h4>Testimonials</h4>
								@foreach($testimonials as $testi)
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
								@endforeach							
							</div>
						</div>

					</div><!-- .sidebar end -->
				</div>

			</div>

		</section><!-- #content end -->
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
			  success: function(data){
				$('#cartInfo').text(data['cart'].totalQty);
				btn.html('Added to Basket');
				$('.add-to-cart').removeClass('disabled');
				btn.addClass('disabled');
				toastr.success('Success','Course has been added to yor basket.');
				console.log(data['cart'].totalQty);
			}
			});
		});
	});
});
</script>
@stop