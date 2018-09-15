@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{getOption('web_title')}}" />
    <meta property="og:description" content="{{getOption('web_description')}}" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/british academy of finance Indonesia.jpg" />
    <meta name="description" content="{{getOption('web_description')}}" />
@stop
@section('content')

<div class="main" style="background: url('{{url('/')}}/photos/baf-silder-(1).jpg'); background-size: cover;">
		
<section id="contact">
	<div class="section-content">
		<h1 class="section-header"> <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> WHAT DO YOU WANT TO PASS ?</span></h1>
		<h3>Helping over 50,000 students pass their CIMA and CPA Australia exams</h3>
	</div>
	<div class="contact-section">
		<div class="container">	
			<div class="row-fluid">
				<div class="span6">
					<div class="button-box">
						<a href="#">CIMA</a>						
					</div>
				</div>
				<div class="span6">					
					<div class="button-box">
						<a href="#">CPA <small>Australia</small></a>						
					</div>
				</div>
			</div>
				
			</div>			
	</div>
</section>
</div>

@stop