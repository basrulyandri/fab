@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{$post->title}} | STIKES IMC BINTARO" />
    <meta property="og:description" content="{{$post->excerpt}}" />
    <meta property="og:image" content="{{url('/')}}{{$post->thumbnail}}" />
    <meta name="description" content="{{$post->excerpt}}" />
@stop
@section('content')
@section('title')
	{{$post->title}}
@stop
<div class="main">
	<div class="container">
		<div class="row">
			@if($post->type == 'page')
				<div class="span12">
			@else
				<div class="span8">
			@endif
				<!-- Content -->
				<div class="content">
					<div class="page-header">
						<h1>{{$post->trans('title')}}</h1>
					</div>
					<!-- Single Page -->
						<div class="page">
							
							{!!$post->trans('body')!!}
						</div>
						<!-- End Single Page -->
				</div>
				<!-- End Content -->
			</div>
			@if($post->type == 'post')
				@include('layouts.frontend.sidebar')
			@endif
		</div>
	</div>
</div>
@stop

@section('footer')

@stop