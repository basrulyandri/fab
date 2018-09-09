@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{getOption('web_title')}}" />
    <meta property="og:description" content="{{getOption('web_description')}}" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/british academy of finance Indonesia.jpg" />
    <meta name="description" content="{{getOption('web_description')}}" />
@stop
@section('content')
<div class="overall">
	<div class="inner">
		<div class="container">
			@if(\LaravelLocalization::getCurrentLocale() == 'id')
				<div class="row-fluid">			
				<div class="span{{numberToColumn(getOption('theme_option_featured_program_amount'))}}">
					<div class="simple-box">
					<i class="icon-check icon-2x icon-round"><span></span></i>
						<!-- <i class="icon-tags icon-2x icon-round"><span></span></i> -->
						<a href="#"><h3>Pilar Perusahaan</h3></a>
						<h4>Deskripsi</h4>
						<p>Fokus pada bagaimana memformulasi seefektif mungkin penerapan strategi. Penekanannya pada manajemen perubahan, manajemen proyek dan hubungan manajemen dan menstrukturisasi manajemen agar berhasil menerapkan strategi.</p>						
					</div>
				</div>
				<div class="span{{numberToColumn(getOption('theme_option_featured_program_amount'))}}">
					<div class="simple-box">
						<i class="icon-book icon-2x icon-round"><span></span></i>
						<a href=""><h3>Pilar Kinerja</h3></a>
						<h4>Deskripsi</h4>
						<p>Fokus pada tools dan teknik manajemen akunting dan manajemen resiko to memastikan strategi yang realistis dan untuk memonitor pemasukan. Hal ini melingkupi anggaran dan biaya manajemen dan mengembangkan kemampuan mengidentifikasi, klasifikasi, evaluasi dan mengelola resiko.</p>						
					</div>
				</div>
				<div class="span{{numberToColumn(getOption('theme_option_featured_program_amount'))}}">
					<div class="simple-box">
						<i class="icon-tablet icon-2x icon-round"><span></span></i>
						<a href="#"><h3>Pilar Keuangan</h3></a>
						<h4>Deskripsi</h4>						
						<p>Fokus pada bagaimana menyiapkan dan menafsirkan lporan keuangan dengan pemahaman tentang kerangka peraturan dan persyaratan pelaporan eksternal. Hal ini melihat implikasi pajak dari keputusan pembiayaan dan merumuskan strategi keuangan.</p>						
					</div>
				</div>				
			</div>
			@else
			<div class="row-fluid">			
				<div class="span{{numberToColumn(getOption('theme_option_featured_program_amount'))}}">
					<div class="simple-box">
					<i class="icon-check icon-2x icon-round"><span></span></i>
						<!-- <i class="icon-tags icon-2x icon-round"><span></span></i> -->
						<a href="#"><h3>Enterprise Pillar</h3></a>
						<h4>Short Description</h4>
						<p>Focus on how to formulate as well as effectively implement strategy. It emphasizes how change management, project management and relationship management and the structuring of Organisations can help to successfully implement strategy.</p>						
					</div>
				</div>
				<div class="span{{numberToColumn(getOption('theme_option_featured_program_amount'))}}">
					<div class="simple-box">
						<i class="icon-book icon-2x icon-round"><span></span></i>
						<a href=""><h3>Performance Pillar</h3></a>
						<h4>Short Description</h4>
						<p>Focus on the tools and techniques of management accounting and risk management to ensure a realistic strategy and to monitor implantation. It covers budgets and cost management and develops the ability to identify, classify, evaluate and manage risk.</p>						
					</div>
				</div>
				<div class="span{{numberToColumn(getOption('theme_option_featured_program_amount'))}}">
					<div class="simple-box">
						<i class="icon-tablet icon-2x icon-round"><span></span></i>
						<a href="#"><h3>Finance Pillar</h3></a>
						<h4>Short Description</h4>						
						<p>Focus on how to prepare and interpret financial statements with an understanding of the regulatory framework and external reporting requirements. It looks at tax implications of financing decisions and formulating financial strategy.</p>						
					</div>
				</div>				
			</div>
			@endif
			<!-- End Simple Box -->
		</div>
	</div>
</div>
<div class="main">
	<div class="container">
			@if(\LaravelLocalization::getCurrentLocale() == 'id')
			<div class="row-fluid">
				<div class="span12">
					<div class="description shadow-large">
						<h3>CIMA UNTUK KUALIFIKASI PROFESIONAL:</h3>
					</div>
					<img src="{{asset('assets/frontend')}}/images/CIMA.jpg" style="float: left; margin: 0 10px 10px 0; width:400px;">
					<p>Kualifikasi Profesional dari CIMA diakui dunia sebagai kualifikasi keuangan yang paling relevan secara global untuk karir. Dengan mengikuti program CIMA anda kan bergabung dengan sebuah organisasi global yang didukung oleh dua badan akuntansi terkemuka di dunia (AICPA- the American Institute of Certified Public Accountants and CIMA) yang membuat manajemen akunting sebagai profesi paling bergengsi di dunia bisnis..</p>

					<p>Ketika anda memiliki kualifikasi profesional dari CIMA, anda akan dianugrahi the Chartered Global Management Accountant (CGMA) designation, pengakuan kapasitas anda, dan menampilkan keahlian profesionalisme, bisnis dan kepemimpinan, etika dan komitmen Anda.</p>

					<p>Dengan menjadi lulusan CIMA anda akan bergabung dengan badan manajemen akuntan profesional terbesar di dunia dan menjadi bagian dari jaringan global lebih dari 600.000 para profesional di bidang keuangan.</p>

					<p>Hanya Kualifikasi Profesional dari CIMA yang dapat memberikan anda paduan yang baik dari skill, pengetahuan dan pengalaman yang dibutuhkan sebagai nilai tambah kepada institusi kepada arah kesuksesan bisnis. Semua kualifikasi ini terdiri dari 3 pilar: Pilar Perusahaan, Pilar kinerja dan Pilar Keuangan. </p>
				</div>
				</div>	
				<div class="callout shadow-large">
				<div class="callout-wrap">
					<div class="row-fluid">
						<div class="span10">
							<div class="message">
								<h1>Memandu Anda Meraih Kesuksesan</h1>
							</div>
						</div>
						<div class="span2">
							<div class="pull-right">
								<div class="button">
									<a href="{{route('page.register')}}" class="btn btn-large">Daftar Sekarang</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			@else
			<div class="row-fluid">
			<div class="span12">
				<div class="description shadow-large">
					<h3>CIMA AS A PROFESSIONAL QUALIFICATION:</h3>
				</div>
				<img src="{{asset('assets/frontend')}}/images/CIMA.jpg" style="float: left; margin: 0 10px 10px 0; width:400px;">
				<p>The CIMA Professional Qualification is recognized worldwide as the most relevant global finance qualification for a career in business. By studying with CIMA you will be joining a global Organisation powered by two of the world’s leading accounting bodies (AICPA- the American Institute of Certified Public Accountants and CIMA) to make management accounting the most valued profession in business worldwide.</p>

				<p>On completion of the CIMA professional qualification, you will be awarded the Chartered Global Management Accountant (CGMA) designation, recognizing your value and showcasing your professionalism, business and leadership skills , ethics and commitment.</p>

				<p>By becoming a CIMA you will be joining the world’s largest professional body of management accountants and become part of a truly global network of over 600,000 current and next generation finance professionals.</p>

				<p>Only the CIMA Professional Qualification can give you the right mix of skills, knowledge and experience needed add value to Organization and drive business success. The whole qualification consists of three main pillars: Enterprise Pillar, Performance Pillar and Financial Pillar.</p>
			</div>
			</div>	
			<div class="callout shadow-large">
				<div class="callout-wrap">
					<div class="row-fluid">
						<div class="span10">
							<div class="message">
								<h1>Will walk you though for success</h1>
							</div>
						</div>
						<div class="span2">
							<div class="pull-right">
								<div class="button">
									<a href="{{route('page.register')}}" class="btn btn-large">Enroll Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			@endif

		

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
						<h2><a href="single.html"><i class="icon-globe"></i> <span>CIMA</span> Course</a></h2>
					</div>
					<!-- Upcoming Events -->
					<section>
						<div id="upcoming-jcarousel" class="upcoming-jcarousel jcarousel" data-auto="5">
							<ul class="events unstyled">
							@foreach(courses() as $course)
								<li>
									<article>
										<figure>
											<span class="ribbon"></span>
											<span class="ribbon_icon"><i class="icon-star"></i></span>
											<a href="{{route('page.course.single',$course->slug)}}" title="{{$course->title}}"><img style="width: 100%;" src="{{url('/')}}/{{$course->thumbnail}}" alt="{{$course->title}}"></a>
										</figure>
										<div class="date">
											<small><i class="icon-picture"></i> </small>
											<div class="pull-right">
												<small></small>
											</div>
										</div>
										<div class="body">
											<h4><a href="{{route('page.course.single',$course->slug)}}" title="{{$course->title}}">{{$course->trans('title')}}</a></h4>
											<p>{{$course->trans('excerpt')}}</p>
											<div class="more">
												<a href="{{route('page.course.single',$course->slug)}}" title="{{$course->title}}"><i class="icon-circle-arrow-right"></i> <span class="hidden-tablet">Read more</span></a>
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