@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{getOption('web_title')}}" />
    <meta property="og:description" content="{{getOption('web_description')}}" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/british academy of finance Indonesia.jpg" />
    <meta name="description" content="{{getOption('web_description')}}" />
@stop
@section('content')

<div class="main">
	<div class="container">
		<div class="row">
			
			<div class="span12">
						<!-- Content -->
						<div class="content">							
								<section id="login">
									<div class="row-fluid">
										<div class="span4 offset4">
											<div class="login">
												<div class="header">
													<h2>{{trans('msg.enroll_to')}} <br><strong>{{getOption('web_title')}}</strong></h2>
												</div>												
												<div class="internal-login">													
													<form>
														<div class="control-group">
															<div class="controls">
																<i class="icon-user"></i>
																<input type="text" class="input-block-level" placeholder="{{trans('msg.first_name')}}">
															</div>
														</div>

														<div class="control-group">
															<div class="controls">
																<i class="icon-user"></i>
																<input type="text" class="input-block-level" placeholder="{{trans('msg.last_name')}}">
															</div>
														</div>
														<div class="control-group">
															<div class="controls">
																<i class="icon-phone"></i>
																<input type="text" class="input-block-level" placeholder="{{trans('msg.phone_number')}}">
															</div>
														</div>

														<div class="control-group">
															<div class="controls">
																<i class="icon-envelope"></i>
																<input type="text" class="input-block-level" placeholder="Email">
															</div>
														</div>

														<div class="control-group">
															<div class="controls">
																<i class="icon-key"></i>
																<input type="password" class="input-block-level" placeholder="Password">
															</div>
														</div>
														<div class="form-actions">
															<div class="pull-right">
																<button type="submit" class="btn btn-large">{{trans('msg.register')}}</button>
															</div>
														</div>
														<hr>
													</form>
												</div>
											</div>
										</div>
									</div>
								</section>
								<!-- Login -->
						</div>
						<!-- End Content -->
					</div>
		</div>
	</div>
</div>
@stop

@section('footer')

@stop