@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{$post->title}} | STIKES IMC BINTARO" />
    <meta property="og:description" content="{{$post->excerpt}}" />
    <meta property="og:image" content="{{url('/')}}{{$post->thumbnail}}" />
    <meta name="description" content="{{$post->excerpt}}" />
@stop
@section('content')

<div class="main">
	<div class="container">
		<div class="row">
					<div class="span8">
						<!-- Content -->
						<div class="content">
							<div class="page-header">
								<h1>{{$post->title}}</h1>
							</div>
							<!-- Single Page -->
								<div class="page">
									
									{!!$post->body!!}
								</div>
								<!-- End Single Page -->
						</div>
						<!-- End Content -->
					</div>
					@include('layouts.frontend.sidebar')
				</div>
	</div>
</div>
@stop

@section('footer')

@stop