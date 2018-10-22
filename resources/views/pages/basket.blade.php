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
			<div class="span12">			
				<!-- Content -->
				<div class="content">
					<div class="page-header">
						<h1>{{trans('app.basket')}}</h1>
					</div>
					<div class="page">
						@if(session('cart'))
							@if(session('cart')->items)
							<table class="table table-striped">
								<thead>
									<tr>
										<th>NO</th>
										<th>COURSE NAME</th>
										<th>PAYMENT SCHEME</th>
										<th>FEE</th>
										<td>ACTIONS</td>
									</tr>
								</thead>
								<tbody>
									@php
										$no = 1;
									@endphp
									@foreach(session('cart')->items as $item)
									<tr>
										<td>{{$no}}</td>
										<td>{{$item['item']->title}}</td>
										<td>{{ucfirst(str_replace('_',' ',$item['payment_scheme']))}}</td>									
										<td><strong>{{toRp($item['price'])}}</strong></td>
										<td><button course-id="{{$item['item']->id}}" class="btn btn-xs btn-danger remove-item"><i class="icon-trash"></i></button></td>
									</tr>
									@php
										$no++;	
									@endphp
									@endforeach								
									<tr>									
										<th colspan="2"></th>									
										<th>Total Fee</th>
										<th class="totalPrice">{{toRp(session('cart')->totalPrice)}}</th>
										<th></th>
									</tr>								
									<tr>									
										<th colspan="2"></th>
										<th>Total QTY</th>
										<th id="totalQty">{{session('cart')->totalQty}}</th>
										<th></th>
									</tr>

								</tbody>							
							</table>

							<a href="{{route('page.checkout')}}" class="btn btn-large btn-info">Checkout</a>
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
		</div>
	</div>
</div>
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
			})			
			.success(function(response) {
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
			});			
		});	
	});	
});
</script>
@stop