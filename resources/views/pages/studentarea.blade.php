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
						<div class="span3">
							<div class="profile-sidebar">
								<!-- SIDEBAR USERPIC -->
								<div class="profile-userpic">
									<img src="{{auth()->user()->getAvatarurl()}}" class="img-responsive" alt="">
								</div>
								<!-- END SIDEBAR USERPIC -->
								<!-- SIDEBAR USER TITLE -->
								<div class="profile-usertitle">
									<div class="profile-usertitle-name">
										{{auth()->user()->getNameOrEmail(true)}}
									</div>
									<div class="profile-usertitle-job">
										{{auth()->user()->role->name}}
									</div>
								</div>
								<!-- END SIDEBAR USER TITLE -->
								<!-- SIDEBAR BUTTONS -->
								<!-- <div class="profile-userbuttons">
									<button type="button" class="btn btn-success btn-sm">Follow</button>
									<button type="button" class="btn btn-danger btn-sm">Message</button>
								</div> -->
								<!-- END SIDEBAR BUTTONS -->
								<!-- SIDEBAR MENU -->
								<!-- <div class="profile-usermenu">
									<ul class="nav">
										<li class="active">
											<a href="#">
											<i class="glyphicon glyphicon-home"></i>
											Overview </a>
										</li>
										<li>
											<a href="#">
											<i class="glyphicon glyphicon-user"></i>
											Account Settings </a>
										</li>
										<li>
											<a href="#" target="_blank">
											<i class="glyphicon glyphicon-ok"></i>
											Tasks </a>
										</li>
										<li>
											<a href="#">
											<i class="glyphicon glyphicon-flag"></i>
											Help </a>
										</li>
									</ul>
								</div> -->
								<!-- END MENU -->
							</div>
						<!-- Aside -->
						<!-- <div class="page-header">
							<h2>Student Menu</h2>
						</div> -->
						<aside>
							<!-- Nav Doc. Widget  -->
						<ul class="nav nav-tabs nav-stacked">							
							<li><a href="#">Courses</a></li>
							<li><a href="#">Profile</a></li>							
						</ul>
						<!-- End Nav Doc. Widget  -->
						</aside>
						<!-- End Aside -->
					</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
@stop

@section('footer')
	
@stop