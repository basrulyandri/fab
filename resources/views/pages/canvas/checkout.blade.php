@extends('layouts.frontend.master-canvas')
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
<section id="page-title">
	<div class="container clearfix">
		<h1><h1>{{trans('app.checkout')}}</h1></h1>		
	</div>
</section>
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="col_one_third nobottommargin">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>NO</th>
							<th>{{trans('app.course-name')}}</th>
							<th>{{trans('app.payment-scheme')}}</th>										
							<th>{{trans('app.fee')}}</th>
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
							<th>Total QTY</th>
							<th id="totalQty">{{session('cart')->totalQty}}</th>
						</tr>
						<tr>									
							<th colspan="2"></th>									
							<th>{{trans('app.total-fee')}}</th>
							<th class="totalPrice">{{toRp(session('cart')->totalPrice)}}</th>
						</tr>								

					</tbody>							
				</table>
			</div>

			<div class="col_two_third col_last nobottommargin">
				<h3>{{strtoupper(trans('app.fill-checkout-form'))}}</h3>
				{!!Form::open(['route' =>'post.page.checkout','class' => 'nobottommargin'])!!}
				<div class="col_full">
					<label for="register-form-first_name">{{trans('msg.first_name')}}</label>
					<input type="text" id="register-form-first_name" name="first_name" class="form-control" required>
				</div>

				<div class="col_full">
					<label for="last_name">{{trans('msg.last_name')}}</label>
					<input type="text" id="register-form-name" name="last_name" class="form-control" required>
				</div>

				<div class="col_full">
					<label for="phone_number">{{trans('msg.phone_number')}}</label>
					<input type="text" id="register-form-name" name="phone" class="form-control" required>
				</div>

				<div class="col_full">
					<label for="email">Email</label>
					<input type="email" id="register-form-name" name="email" class="form-control" required>
				</div>

				<div class="col_full">
					<label for="password">Password</label>
					<input type="password" id="register-form-name" name="password" class="form-control" required>
				</div>
					
				<div class="col_full nobottommargin">
					<input type="submit" class="button button-3d button-black nomargin" value="{{trans('app.submit')}}">
				</div>
				</form>
			</div>
		</div>
	</div>
</section>


@stop

@section('footer')
	
@stop