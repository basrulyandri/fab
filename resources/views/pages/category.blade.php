@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{'Kategori' . $category->label}} | STIKES IMC BINTARO" />
    <meta property="og:description" content="Kumpulan kategori {{$category->label}} dari STIKES IMC Bintaro Tangerang" />
    <meta property="og:image" content="{{url('/')}}/{{getOption('theme_option_logo')}}" />
    <meta name="description" content="Kumpulan kategori {{$category->label}} dari STIKES IMC Bintaro Tangerang" />
@stop
@section('content')
<div class="main">
	<div class="container">
		<div class="row">
			<div class="span8">
				<!-- Content -->
				<div class="content">
					<!-- Blog -->
						<section class="blog">
							<div class="page-header">
								<h1>Blog Page</h1>
							</div>

							@foreach($posts as $post)
							<div class="item">
								<div class="row">
									<div class="span3">
										<figure>
											<a href="single.html">
												<img src="{{url('/').$post->thumbnail}}" alt="">
												<div class="icon">
													<i class="icon-play"></i>
												</div>
											</a>
										</figure>
										<div class="comments-block">
											<small><i class="icon-picture"></i> {{$category->label}}</small>
											<div class="pull-right">
												<small><i class="icon-comments"></i> 12 Comments</small>
											</div>
										</div>
									</div>
									<div class="span4">
										<h3>{{$post->title}}</h3>
										<p class="meta">
											<i class="icon-time"></i> {{$post->created_at->format('d M Y')}} | <i class="icon-user"></i> oleh <a href="#"><em>{{$post->user->getNameOrEmail(true)}}</em></a>
										</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam inventore dicta velit tempore alias labore aut iusto fuga non suscipit? Magni cum perspiciatis qui hic cupiditate possimus voluptates enim asperiores rerum doloremque similique amet? Amet ex fuga quo hic quibusdam.</p>
										<a href="{{route('page.single',$post->slug)}}"><i class="icon-circle-arrow-right"></i> Read More</a>
									</div>
								</div>
							</div>
							@endforeach
							<div class="pagination">
							{{$posts->links()}}
								<!-- <ul>
									<li><a href="single.html">Prev</a></li>
									<li><a href="single.html">1</a></li>
									<li><a href="single.html">2</a></li>
									<li><a href="single.html">3</a></li>
									<li><a href="single.html">4</a></li>
									<li><a href="single.html">5</a></li>
									<li><a href="single.html">Next</a></li>
								</ul> -->
							</div>
						</section>
						<!-- Blog -->
				</div>
				<!-- End Content -->
			</div>
			@include('layouts.frontend.sidebar')
		</div>
		<a href="#" class="scroll-top"><i class="icon-chevron-up"></i></a>
	</div>
</div>		
@stop