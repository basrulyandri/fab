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
						<h1>Checkout</h1>
					</div>
					<div class="page">
						@if(auth()->check())
							Chekcout
						@else
							<section id="login">
									<div class="row-fluid">
										<div class="span6">
											<table class="table table-striped">
								<thead>
									<tr>
										<th>NO</th>
										<th>FEE</th>
										<th>COURSE NAME</th>
										<th>PAYMENT SCHEME</th>										
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
										</div>
										<div class="span6">
											<div class="login">
												<div class="header">
													<h2>Fill this form to complete your order</h2>
												</div>												
												<div class="internal-login">	
												{!!Form::open(['route' =>'post.page.checkout'])!!}												
													<form>
														<div class="control-group">
															<div class="controls">
																<i class="icon-user"></i>
																<input type="text" name="first_name" class="input-block-level" placeholder="{{trans('msg.first_name')}}" required>
															</div>
														</div>

														<div class="control-group">
															<div class="controls">
																<i class="icon-user"></i>
																<input type="text" name="last_name" class="input-block-level" placeholder="{{trans('msg.last_name')}}" required>
															</div>
														</div>
														<div class="control-group">
															<div class="controls">
																<i class="icon-phone"></i>
																<input type="text" name="phone" class="input-block-level" placeholder="{{trans('msg.phone_number')}}" required>
															</div>
														</div>

														<div class="control-group">
															<div class="controls">
																<i class="icon-envelope"></i>
																<input type="text" class="input-block-level" name="email" placeholder="Email" required>
															</div>
														</div>

														<div class="control-group">
															<div class="controls">
																<i class="icon-key"></i>
																<input type="password" class="input-block-level" placeholder="Password" name="password" required>
															</div>
														</div>
														<div class="form-actions">
															<div class="pull-right">
																<button type="submit" class="btn btn-large">Checkout</button>
															</div>
														</div>
														<hr>
													</form>
												</div>
											</div>
										</div>
									</div>
								</section>
						@endif
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
@stop

@section('footer')
	
@stop