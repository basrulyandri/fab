@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{$course->title}} | STIKES IMC BINTARO" />
    <meta property="og:description" content="{{$course->description}}" />
    <meta property="og:image" content="{{url('/')}}{{$course->thumbnail}}" />
    <meta name="description" content="{{$course->description}}" />
@stop
@section('content')

<div class="main">
	<div class="container">
		<div class="row">			
				<div class="span12">			
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
				</div>
				<!-- End Content -->
			</div>			
		</div>
	</div>
</div>
@stop

@section('footer')

@stop