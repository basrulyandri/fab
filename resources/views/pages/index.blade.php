@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="STIKES IMC BINTARO | Sekolah Tinggi Ilmu Kesehatan di tangerang" />
    <meta property="og:description" content="Sekolah Tinggi Ilmu Kesehatan di Bintaro Jakarta Selatan yang menciptakan lulusan profesional sesuai dengan kebutuhan kerja dan penempatan kerja di Jepang" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/STIKES-IMC-BINTARO-OG-IMAGE.jpg" />
    <meta name="description" content="Sekolah Tinggi Ilmu Kesehatan di Bintaro Jakarta Selatan yang menciptakan lulusan profesional sesuai dengan kebutuhan kerja dan penempatan kerja di Jepang" />
@stop
@section('content')
<div class="overall">
	<div class="inner">
		<div class="container">
			<div class="page-header">
				<h3><a style="color: #FFF;" href="#"><i class="icon-globe"></i> <span>PROGRAM</span> STIKES IMC</a></h3>
			</div>
			<!-- Simple Box -->
			<div class="row-fluid">			
				<div class="span{{numberToColumn(getOption('theme_option_featured_program_amount'))}}">
					<div class="simple-box">
					<img class="img-circle icon-rollo-service" src="{{url('assets/frontend')}}/images/rollo-icons/icon-bidan.png" alt="">
						<!-- <i class="icon-tags icon-2x icon-round"><span></span></i> -->
						<a href="#"><h3>Kebidanan</h3></a>
						<h4></h4>
						<p>Menghasilkan bidan profesional, memiliki kompetensi, mampu bekerja dengan penuh kasih, dan mampu mengola pelayanan kesehatan dalam populasi tertentu</p>						
					</div>
				</div>
				<div class="span{{numberToColumn(getOption('theme_option_featured_program_amount'))}}">
					<div class="simple-box">
						<img class="img-circle icon-rollo-service" src="{{url('assets/frontend')}}/images/rollo-icons/icon-perawat.png" alt="">
						<a href=""><h3>Keperawatan</h3></a>
						<h4></h4>
						<p>Berorientasi pada pengembangan lulusan ners yang profesional dan dapat memenuhi kebutuhan pengguna serta memiliki kompetensi unggulan keperawatan gerontik.</p>						
					</div>
				</div>
				<div class="span{{numberToColumn(getOption('theme_option_featured_program_amount'))}}">
					<div class="simple-box">
						<img class="img-circle icon-rollo-service" src="{{url('assets/frontend')}}/images/rollo-icons/icon-perawat.png" alt="">
						<a href="#"><h3>Profesi NERS</h3></a>
						<h4></h4>						
						<p>program studi penyelenggara akademik dan profesi yang mampu berdaya saing global serta unggul dibidang Keperawatan Gerontik pada tahun 2023.</p>						
					</div>
				</div>
				<div class="span{{numberToColumn(getOption('theme_option_featured_program_amount'))}}">
					<div class="simple-box">
						<img class="img-circle icon-rollo-service" src="{{url('assets/frontend')}}/images/rollo-icons/icon-PCA.png" alt="">
						<a href="#"><h3>Personal Care Assistant</h3></a>
						<h4></h4>						
						<p>Pusat Pelatihan dan Penyedia Sumber Daya Manusia di Indonesia dengan standar Internasional.</p>
					</div>
				</div>
			</div>
			<!-- End Simple Box -->
		</div>
	</div>
</div>
<div class="main">
	<div class="container">
		<div class="row-fluid">
			<div class="span4">
				<article>
					<figure>
						<a href="single.html"><img src="{{url('/')}}{{getOption('theme_option_sambutan_image')}}" alt=""></a>
					</figure>
					<div class="date animated fadeInUp" style="opacity: 1;">						
						<div class="pull-right">
							<h3>{{getOption('theme_option_sambutan_nama')}}</h3>
						</div>
					</div>
					
				</article>
			</div>
			
			<div class="span8">
				<div class="content-box">
					<h3>{{getOption('theme_option_sambutan_title')}}</h3>
					<blockquote>
					  <p>{!!getOption('theme_option_sambutan_content')!!}</p>
					  <!-- <small>13 April <cite title="Source Title">2014</cite></small> -->
					</blockquote>
				</div>
			</div>
		</div>		
		<div class="callout">
			<div class="callout-wrap">
				<div class="row-fluid">
					<div class="span10">
						<div class="message">
							<h4>DOWNLOAD BROSUR LENGKAP STIKES IMC</h4>
							<p>Untuk mendapatkan Informasi lengkap mengenai Program-program yang ada di STIKERS IMC Bintaro, anda bisa mendownload brosur disini</p>
						</div>
					</div>
					<div class="span2">
						<div class="pull-right">
							<div class="button">
								<a href="{{route('page.download.brosur')}}" class="btn btn-info btn-large">Download Sekarang</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="row-fluid">
			<div class="description shadow-large">				
				<h4>DOWNLOAD BROSUR LENGKAP STIKES IMC</h4>
				<a href="#" class="btn btn-info btn-large">Download Sekarang</a>				
			</div>
		</div> -->

		<div class="row">
			<div class="span12">
				<!-- Content -->
				<div class="content">
					<div class="page-header">
						<h2><a href="single.html"><i class="icon-globe"></i> <span>Berita</span> STIKES IMC</a></h2>
					</div>
					<!-- Upcoming Events -->
					<section>
						<div id="upcoming-jcarousel" class="upcoming-jcarousel jcarousel" data-auto="5">
							<ul class="events unstyled">
							@foreach($latestPosts as $lp)
								<li>
									<article>
										<figure>
											<span class="ribbon"></span>
											<span class="ribbon_icon"><i class="icon-star"></i></span>
											<a href="{{route('page.single',['slug' => $lp->slug])}}" title="{{$lp->title}}"><img style="width: 100%;" src="{{url('/')}}/{{$lp->thumb()}}" alt="{{$lp->title}}"></a>
										</figure>
										<div class="date">
											<small><i class="icon-picture"></i> {{$lp->categories_comma()}}</small>
											<div class="pull-right">
												<small>{{$lp->published_at->format('d M Y')}}</small>
											</div>
										</div>
										<div class="body">
											<h4><a href="{{route('page.single',['slug' => $lp->slug])}}" title="{{$lp->title}}">{{$lp->title}}</a></h4>
											<p>{{$lp->excerpt}}</p>
											<div class="more">
												<a href="{{route('page.single',['slug' => $lp->slug])}}" title="{{$lp->title}}"><i class="icon-circle-arrow-right"></i> <span class="hidden-tablet">Read more</span></a>
												<!-- <div class="pull-right">
													<a href="single.html"><i class="icon-comments"></i> 14</a>
													<a href="single.html"><i class="icon-heart"></i> 122</a>
												</div> -->
											</div>
										</div>
									</article>
								</li>
								@endforeach
							</ul>
									<!-- <ul class="flex-direction-nav">
										<li><a href="single.php" class="flex-prev flex-disabled"><i class="icon-chevron-left"></i></a></li>
										<li><a href="single.php"><i class="icon-th"></i></a></li>
										<li><a href="single.php" class="flex-next"><i class="icon-chevron-right"></i></a></li>
									</ul> -->
								</div>
							</section>
							
							
						
						
						
				
					</div>					
				</div>
				<a href="#" class="scroll-top"><i class="icon-chevron-up"></i></a>
			</div>
		</div>	
</div>
@stop