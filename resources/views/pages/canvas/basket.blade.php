@extends('layouts.frontend.master-canvas')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="BAF Basket | {{getOption('web_title')}}" />
    <meta property="og:description" content="Basket Page {{getOption('web_title')}}" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/british academy of finance Indonesia.jpg" />
    <meta name="description" content="Basket page of {{getOption('web_title')}}" />
@stop
@section('title')
	Basket
@stop
@section('content')

<section id="page-title">
	<div class="container clearfix">
		<h1><h1>{{trans('app.basket')}}</h1></h1>		
	</div>
</section>

<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="table-responsive">
				@if(session('cart'))
					@if(session('cart')->items)
						<table class="table cart">
							<thead>
								<tr>									
									<th class="cart-product-thumbnail">NO</th>
									<th class="cart-product-name">{{trans('app.course-name')}}</th>
									<th class="cart-product-price">{{trans('app.payment-scheme')}}</th>									
									<th class="cart-product-subtotal">{{trans('app.actions')}}</th>
								</tr>
							</thead>
							<tbody>
								@php
									$no = 1;
								@endphp
								@foreach(session('cart')->items as $item)
								<tr class="cart_item">
									<td>{{$no}}</td>
										<td>{{$item['item']->title}}</td>
										<td>{{ucfirst(str_replace('_',' ',$item['payment_scheme']))}}</td>									
										<td><button course-id="{{$item['item']->id}}" class="btn btn-xs btn-danger remove-item"><i class="icon-trash"></i></button></td>
								</tr>
								@php
									$no++;	
								@endphp
								@endforeach									
							</tbody>
						</table>
						<div class="row clearfix">
						<div class="col-lg-6 clearfix">							
						</div>

						<div class="col-lg-6 clearfix">							

							<div class="table-responsive">
								<table class="table cart">
									<tbody>										
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Total Qty</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount totalQty">{{session('cart')->totalQty}}</span>
											</td>
										</tr>	
										<tr class="cart_item">
											<td colspan="2">
												<div class="row clearfix">
													<div class="col-lg-12 nopadding">
														<a href="{{route('page.checkout')}}" class="button button-3d notopmargin fright">{{trans('app.checkout')}}</a>
													</div>
												</div>
											</td>
										</tr>									
									</tbody>

								</table>
							</div>
						</div>
					</div>
					@else
						@if(\LaravelLocalization::getCurrentLocale() == 'en')
						<div class="callout shadow-large">
							<div class="callout-wrap">
								<div class="row-fluid">
									<div class="span10">
										<div class="message">
											<h4>You don't have any courses in your basket.</h4>
										</div>
									</div>
									<div class="span2">
										<div class="pull-right">
											<div class="button">
												<a href="{{route('page.courses')}}" class="btn btn-info btn-large">Go To Courses Page</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif

						@if(\LaravelLocalization::getCurrentLocale() == 'id')
						<div class="callout shadow-large">
							<div class="callout-wrap">
								<div class="row-fluid">
									<div class="span10">
										<div class="message">
											<h4>Anda belum memiliki kursus di keranjang.</h4>
										</div>
									</div>
									<div class="span2">
										<div class="pull-right">
											<div class="button">
												<a href="{{route('page.courses')}}" class="btn btn-info btn-large">Ke halaman Kursus</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
					@endif
						@else
					@if(\LaravelLocalization::getCurrentLocale() == 'en')
								<div class="callout shadow-large">
									<div class="callout-wrap">
										<div class="row-fluid">
											<div class="span10">
												<div class="message">
													<h4>You don't have any courses in your basket.</h4>
												</div>
											</div>
											<div class="span2">
												<div class="pull-right">
													<div class="button">
														<a href="{{route('page.courses')}}" class="btn btn-info btn-large">Go To Courses Page</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endif

								@if(\LaravelLocalization::getCurrentLocale() == 'id')
								<div class="callout shadow-large">
									<div class="callout-wrap">
										<div class="row-fluid">
											<div class="span10">
												<div class="message">
													<h4>Anda belum memiliki kursus di keranjang.</h4>
												</div>
											</div>
											<div class="span2">
												<div class="pull-right">
													<div class="button">
														<a href="{{route('page.courses')}}" class="btn btn-info btn-large">Ke halaman Kursus</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endif
						@endif
			</div>
		</div>
	</div>
</section>

@stop

@section('footer')
	<script>
jQuery(function($) {
	$(document).ready(function(){
		function toRp(angka){
		    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
		    var rev2    = '';
		    for(var i = 0; i < rev.length; i++){
		        rev2  += rev[i];
		        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
		            rev2 += '.';
		        }
		    }
		    return 'Rp. ' + rev2.split('').reverse().join('');
		}

		$('.remove-item').click(function(){			
			var btn = $(this);			
			btn.html('<i class="icon-refresh icon-spin"></i> ...removing');			
			var course_id = btn.attr('course-id');
			var _token = '{{Session::token()}}';
			$.ajax({
				url: "{{route('ajax.post.removecoursefromcart')}}",
				type: 'POST',				
				data: {_token:_token,course_id:course_id},
				success: function(response) {
				console.log(response);
				btn.closest('tr').hide('slow',function(){
					btn.remove();
				});
				$('#totalQty').text(response['cart'].totalQty);
				$('.totalPrice').html('<strong>'+toRp(response['cart'].totalPrice)+'</strong>');
				if(response['cart'].items.length == 0){
					$('.page').html('<div class="callout shadow-large"><div class="callout-wrap"><div class="row-fluid"><div class="span10"><div class="message"><h4>You don"t have any courses in your basket.</h4></div></div><div class="span2"><div class="pull-right"><div class="button"><a href="/courses" class="btn btn-info btn-large">Go To Courses Page</a></div></div></div></div></div></div>');
				}
				toastr.success('Success','1 course has been deleted.'); 
				}
			});			
		});	
	});	
});
</script>
@stop