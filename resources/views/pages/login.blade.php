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
					<div class="page">	
						<section id="login">					
							<div class="span4 offset4">
								<div class="login" style="margin-bottom: 20px;">
									<div class="header">
										<h2>Login</h2>
									</div>												
									<div class="internal-login">	
									{!!Form::open(['route' =>'auth.dologin'])!!}												
										<form>
											<div class="control-group">
												<div class="controls">
													<i class="icon-user"></i>
													<input type="email" name="email" class="input-block-level" placeholder="Email">
												</div>
											</div>
											
											<div class="control-group">
												<div class="controls">
													<i class="icon-key"></i>
													<input type="password" class="input-block-level" placeholder="Password" name="password">
												</div>
											</div>
											<div class="form-actions">
												<div class="pull-right">
													<button type="submit" class="btn btn-large">Login</button>
												</div>
											</div>
											<hr>
										</form>
									</div>
								</div>
							</div>
						</section>
						<br>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
@stop

@section('footer')
	
@stop