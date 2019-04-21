@extends('layouts.frontend.master-canvas')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="{{getOption('web_title')}}, {{getOption('web_description')}}" />
    <meta property="og:description" content="Helping you to pass CIMA Exams" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/british academy of finance Indonesia.jpg" />
    <meta name="description" content="{{getOption('web_description')}} Helping you to pass CIMA Exams" />
@stop
@section('title')
	{{getOption('web_description')}}
@stop
@section('content')
		<section id="content">
			<div class="content-wrap">
				<div class="promo promo-light promo-full bottommargin-lg header-stick notopborder">
					<div class="container clearfix one-page-menu" data-easing="easeInOutExpo" data-speed="1500">
						<h3><span>{{trans('msg.register_call_to_action')}}</span></h3>
						<span>{{trans('msg.register_call_to_action_message')}}</span>
						<a href="#" data-href="#section-work" class="button button-dark button-xlarge button-rounded">{{trans('msg.go_to_courses')}}</a>
					</div>
				</div>
				<section id="section-about" class="page-section" data-animate="bounceInLeft">
					<div class="container clearfix">


						<div class="heading-block center">
							<h2><span>The British Academy Of Finance</span></h2>
							<span>Will walk you though for success</span>
						</div>
						@if(\LaravelLocalization::getCurrentLocale() == 'en')
						<div class="col_one_third">
							<div class="heading-block fancy-title nobottomborder title-bottom-border">
								<h4>Why choose <span>Us</span>.</h4>
							</div>
							<p>Programmes that will equip you with to impact your objectives and develop personally. We take the time to explore your needs to ensure programmes meet your requirements.</p>
						</div>
						<div class="col_one_third">
							<div class="heading-block fancy-title nobottomborder title-bottom-border">
								<h4>Our <span>Mission</span>.</h4>
							</div>

							<p>The British Academy of Finance training is delivered in a practical and engaging format by industry experienced trainers who have actually done the job.</p>

						</div>

						<div class="col_one_third col_last">
							<div class="heading-block fancy-title nobottomborder title-bottom-border">
								<h4>What we <span>Do</span>.</h4>
							</div>
							<p>As a CIMA Learning partner adds value by delivering very focused effort to work with individuals to mobilize their knowledge and skill levels to meet CIMA professional standards. The proven passed rates have shown in Indonesia dramatically.</p>
						</div>

						@endif

						@if(\LaravelLocalization::getCurrentLocale() == 'id')
							<div class="col_one_third">
							<div class="heading-block fancy-title nobottomborder title-bottom-border">
								<h4>Kenapa memilih <span>Kami</span>.</h4>
							</div>
							<p>Program yang akan membekali Anda untuk memengaruhi tujuan Anda dan mengembangkan diri secara pribadi.Kami meluangkan waktu untuk mengeksplorasi kebutuhan Anda untuk memastikan program memenuhi persyaratan Anda.</p>
						</div>
						<div class="col_one_third">
							<div class="heading-block fancy-title nobottomborder title-bottom-border">
								<h4>Misi <span>Kami</span>.</h4>
							</div>

							<p>Pelatihan British Academy of Finance disampaikan dalam format praktis dan menarik oleh pelatih berpengalaman industri yang benar-benar telah melakukan pekerjaan bersangkutan.</p>

						</div>

						<div class="col_one_third col_last">
							<div class="heading-block fancy-title nobottomborder title-bottom-border">
								<h4>Apa yang kami <span>Lakukan</span>.</h4>
							</div>
							<p>Sebagai mitra Pembelajaran CIMA menambah nilai dengan memberikan upaya yang sangat terfokus untuk bekerja dengan individu untuk memobilisasi pengetahuan dan tingkat keterampilan mereka untuk memenuhi standar profesional CIMA.</p>
						</div>
						@endif

						<div class="clear"></div>

					</div>

					

				</section>
				
				<section id="section-team" class="page-section topmargin-lg" data-animate="fadeInUp">

					<div class="heading-block center">
						<h2>{{trans('app.our-team')}}</h2>
						<span>People who have contributed enormously to our Company.</span>
					</div>

					<div class="container clearfix">
						
						<div class="row">
							<div class="col-lg-6 bottommargin">

								<div class="team team-list clearfix">
									<div class="team-image">
										<img src="/photos/lalith-de-silva-th-british-academy-of-finance.jpg" alt="John Doe">
									</div>
									<div class="team-desc">
										<div class="team-title"><h4>Lalith De Silva</h4><span>Programme Director</span></div>
										<div class="team-content"><p>FCMA, CGMA, FCPA (Aust.), MBA (Aust.) CIMA Course Leader (CIMA accredited Global Learning Partner)Founder of British Academy of Finance - Jakarta, Indonesia.</p>
										<p>A fully qualified Financial and Management professional with proven track record of over 24 years in industries from Oil & Gas, Trading, Logistics, Manufacturing and F&B. Worked in both multinational environments and single country-based Organizations</p>
										</div>										
									</div>
								</div>

							</div>

							<div class="col-lg-6 bottommargin">

								<div class="team team-list clearfix">
									<div class="team-image">
										<img src="/photos/august-the-british-academy-of-finance.jpg" alt="Nix Maxwell">
									</div>
									<div class="team-desc">
										<div class="team-title"><h4>Augustus Perera</h4><span>Senior Consultant</span></div>
										<div class="team-content">
											<p>A multi discipline professionally qualified individual with 15 years of corporate management experience</p>
											<p>He have worked with best in class consultants McKinsey USA, SIEMENS IN, KPMG CA, LeanCor USA and have Experience with Global Companies like GSK (Life Science and Chemicals), M&S, G-Star, George (Fashion & Apparel), Uniliver (FMCG), Etisalat, Dialog (Telecommunication), Camso, Solideal (Industrial goods), Litro (LPG Gas & Energy) , Maldives Port / SLPA (Project Cargo) are highlights among many other.</p>
										</div>										
									</div>
								</div>
							</div>													
						</div>
					</div>

					<div class="section parallax" style="background-image: url('{{url('/')}}/assets/frontend/canvas/images/baf/parallax-3.jpg'); padding: 100px 0;" data-bottom-top="background-position:0px 100px;" data-top-bottom="background-position:0px -100px;">
						<div class="heading-block center nobottomborder nobottommargin">
							<h2 style="text-transform: none;">It is a walk-though journey with us to acquire a globally recognized management accounting qualification.</h2>
						</div>
					</div>

				</section>

				<section id="section-work" class="page-section topmargin-lg" data-animate="bounceInDown">
					<div class="container clearfix">
					<div class="heading-block center">
						@if(\LaravelLocalization::getCurrentLocale() == 'en')
							<h2>Our Courses</h2>					
						@endif

						@if(\LaravelLocalization::getCurrentLocale() == 'id')
							<h2>Kursus Kami</h2>
						@endif
												
					</div>

					<ul class="portfolio-filter clearfix" data-container="#Bcourse">
							<li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
						
						<li><a href="#" data-filter=".pf-courses-for-all">Courses For All</a></li>	
						<li><a href="#" data-filter=".pf-courses-for-students">Courses for University STUDENTS</a></li>	
						<li><a href="#" data-filter=".pf-courses-for-working-professionals">Courses for Working PROFESSIONALS</a></li>	
						

					</ul><!-- #portfolio-filter end -->

					<div class="clear"></div>
					<div class="container clearfix center">
						<div id="Bcourse" class="portfolio grid-container clearfix">
							@foreach($levelForAll as $level)								
								<article class="portfolio-item pf-media pf-courses-for-all">
									<div class="portfolio-image">
										<a href="{{route('page.level.single',$level->slug)}}">
											<img src="{{$level->thumbnail}}" alt="{{$level->title}}">
										</a>
										<div class="portfolio-overlay">									
											<a href="{{route('page.level.single',$level->slug)}}" class="center-icon"><i class="icon-line-eye"></i></a>
										</div>
									</div>								
								</article>								
							@endforeach

							@foreach($coursesForStudents as $cfs)
									<article class="portfolio-item pf-media pf-courses-for-students">
										<div class="portfolio-image">
											<a href="{{route('page.course.single',$cfs->slug)}}">
												<img src="{{$cfs->thumbnail}}" alt="{{$cfs->title}}">
											</a>
											<div class="portfolio-overlay">									
												<a href="{{route('page.course.single',$cfs->slug)}}" class="center-icon"><i class="icon-line-eye"></i></a>
											</div>
										</div>								
									</article>
							@endforeach

							@foreach($coursesForprofessionals as $cfwp)
									<article class="portfolio-item pf-media pf-courses-for-working-professionals">
										<div class="portfolio-image">
											<a href="{{route('page.course.single',$cfwp->slug)}}">
												<img src="{{$cfwp->thumbnail}}" alt="{{$cfwp->title}}">
											</a>
											<div class="portfolio-overlay">									
												<a href="{{route('page.course.single',$cfwp->slug)}}" class="center-icon"><i class="icon-line-eye"></i></a>
											</div>
										</div>								
									</article>
							@endforeach
						</div><!-- #portfolio end -->															
					</div>
					</div>
				</section>

				

				

				<section id="section-testimonials" class="page-section section parallax dark" style="background-image: url('{{url('/')}}/assets/frontend/canvas/images/baf/me-parallax.jpg'); padding: 200px 0;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">

					<div class="container clearfix">

						<div class="col_half nobottommargin">&nbsp;</div>

						<div class="col_half nobottommargin col_last">

							<div class="heading-block center">

								<h4>{{trans('app.testimonials')}}</h4>
								
							</div>

							<div class="fslider testimonial testimonial-full nobgcolor noborder noshadow nopadding" data-arrows="false">
								<div class="flexslider">
									<div class="slider-wrap">
										@foreach($testimonials as $testi)
										<div class="slide">
											<div class="testi-content">
												{!!$testi->body!!}
												<div class="testi-meta">
													{{$testi->name}}
													<span>{{$testi->position_title}}</span>
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
							<div class="text-center topmargin">
								<a href="{{url('/testimonials')}}" class="button button-3d button-mini button-rounded button-red">{{trans('app.see-all')}}</a>
							</div>
						</div>

					</div>

				</section>

				<section id="section-contact" class="page-section">

					<div class="heading-block title-center">
						@if(\LaravelLocalization::getCurrentLocale() == 'en')
							<h2>Get in Touch with us</h2>						
						@endif

						@if(\LaravelLocalization::getCurrentLocale() == 'id')
							<h2>Kontak Kami</h2>
						@endif
					</div>

					<div class="container clearfix">

						<!-- Contact Form
						============================================= -->
						<!-- <div class="col_half">

							<div class="fancy-title title-dotted-border">
								<h3>Send us an Email</h3>
							</div>

							<div class="contact-widget">

								<div class="contact-form-result"></div>

								<form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

								<div class="form-process"></div>

								<div class="col_one_third">
									<label for="template-contactform-name">Name <small>*</small></label>
									<input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
								</div>

								<div class="col_one_third">
									<label for="template-contactform-email">Email <small>*</small></label>
									<input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
								</div>

								<div class="col_one_third col_last">
									<label for="template-contactform-phone">Phone</label>
									<input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
								</div>

								<div class="clear"></div>

								<div class="col_full">
									<label for="template-contactform-subject">Subject <small>*</small></label>
									<input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
								</div>							

								<div class="clear"></div>

								<div class="col_full">
									<label for="template-contactform-message">Message <small>*</small></label>
									<textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
								</div>

								<div class="col_full hidden">
									<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
								</div>

								<div class="col_full">
									<button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
								</div>

							</form>

						</div>


						</div> --><!-- Contact Form End -->

						<!-- Google Map
						============================================= -->
						<!-- <div class="col_half col_last">

							<section id="google-map" class="gmap" style="height: 410px;"></section>


						</div> --><!-- Google Map End -->

						<!-- Contact Info
						============================================= -->
						<div class="col_full nobottommargin clearfix">

							<div class="col_one_third">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-map-marker2"></i></a>
									</div>
									<h3>{{trans('app.address')}}<span class="subtitle">Finance Center Tower 2, Lantai 33 Jl. Jend. Sudirman Kav.22-23 Jakarta Selatan 12920 </span></h3>
								</div>
							</div>

							<div class="col_one_third">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-phone3"></i></a>
									</div>
									<h3>{{trans('app.call-us')}}
										<span class="subtitle">WA: +{{getOption('theme_option_hotline')}}</span>
										<span class="subtitle">Phone: +62 21 8086 9481</span>
									</h3>
								</div>
							</div>

							<div class="col_one_third col_last">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-email"></i></a>
									</div>
									<h3>Email<span class="subtitle">{{getOption('theme_option_email')}}</span>
									<span class="subtitle">dammicool@gmail.com</span>
									</h3>
								</div>
							</div>						

						</div><!-- Contact Info End -->

					</div>

				</section>

			</div>

		</section>
@stop

@section('slider')
	<section id="slider" class="slider-element slider-parallax full-screen with-header swiper_wrapper clearfix">

			<div class="slider-parallax-inner">

				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						@if(\LaravelLocalization::getCurrentLocale() == 'en')
							<div class="swiper-slide dark" style="background-image: url('{{url('/')}}/photos/baf-silder-(2).jpg');">
								<div class="container clearfix">
									<div class="slider-caption slider-caption-center">
										<h3 style="font-size: 28pt;" data-animate="fadeInUp">We Offer more than just CIMA study support</h3>
										<ul style="list-style: none;">
											<li>STUDY SUMMARIES</li>
											<li>24/7 SUPPORT</li>
											<li>LIVE SESSIONS</li>
											<li>INDIVIDUAL SESSIONS</li>
										</ul>										
									</div>
								</div>
							</div>
							<div class="swiper-slide dark" style="background-image: url('{{url('/')}}/photos/cima-slider.jpg');">
								<div class="container clearfix">
									<div class="slider-caption slider-caption-center">
										<h3 style="font-size: 28pt;" data-animate="fadeInUp">Why global management accounting qualification?</h3>
										<ul style="list-style: none;">
											<li><strong>Catch the eye of employers around the globe</strong></li>
											<li><strong>Choose your own role</strong></li>
											<li><strong>Earn higher salaries</strong></li>	
											<li><strong>Study at your own speed</strong></li>									
										</ul>
									</div>
								</div>
								<div class="video-wrap">
									<video poster="{{url('/')}}/assets/frontend/canvas/images/videos/explore.jpg" preload="auto" loop autoplay muted>
										<source src='{{url('/')}}/assets/frontend/canvas/images/videos/explore.mp4' type='video/mp4' />
										<source src='{{url('/')}}/assets/frontend/canvas/images/videos/explore.webm' type='video/webm' />
									</video>
									<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
								</div>
							</div>

							<div class="swiper-slide dark" style="background-image: url('{{url('/')}}/photos/lalith-baf.jpg');">
								<div class="container clearfix">
									<div class="slider-caption slider-caption-center">
										<h3 style="font-size: 28pt;" data-animate="fadeInUp">3 Steps to Pass The Exam</h3>
										<ul style="list-style: none;">
											<li><strong>Study Material (Power point presentations and Videos)</strong></li>
											<li><strong>On-line Tutoring- (20 Hours)</strong></li>
											<li><strong>Revision Questions</strong></li>	
											<li><strong>Go To Courses </strong></li>									
											<li><strong>We Offer more than just CIMA study support</strong></li>
										</ul>
									</div>
								</div>
								<div class="video-wrap">
									<video poster="{{url('/')}}/assets/frontend/canvas/images/videos/explore.jpg" preload="auto" loop autoplay muted>
										<source src='{{url('/')}}/assets/frontend/canvas/images/videos/explore.mp4' type='video/mp4' />
										<source src='{{url('/')}}/assets/frontend/canvas/images/videos/explore.webm' type='video/webm' />
									</video>
									<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
								</div>
							</div>
							
						@endif
						@if(\LaravelLocalization::getCurrentLocale() == 'id')
							<div class="swiper-slide dark" style="background-image: url('{{url('/')}}/photos/baf-silder-(2).jpg');">
								<div class="container clearfix">
									<div class="slider-caption slider-caption-center">
										<h3 style="font-size: 28pt;" data-animate="fadeInUp">Kami menawarkan lebih dari sekedar dukungan dari CIMA</h3>
										<ul style="list-style: none;">
											<li>RINGKASAN BELAJAR</li>
											<li>DUKUNGAN 24 JAM</li>
											<li>SESI SIARAN LANGSUNG</li>
											<li>SESI PRIVAT</li>
										</ul>										
									</div>
								</div>
							</div>
							<div class="swiper-slide dark" style="background-image: url('{{url('/')}}/photos/cima-slider.jpg');">
								<div class="container clearfix">
									<div class="slider-caption slider-caption-center">
										<h3 style="font-size: 28pt;" data-animate="fadeInUp">Mengapa perlu global untuk kualifikasi manajemen akunting ?</h3>
										<ul style="list-style: none;">
											<li><strong>Dapat perhatian dari seluruh dunia</strong></li>
											<li><strong>Pilih jabatanmu</strong></li>
											<li><strong>Gaji lebih besar</strong></li>	
											<li><strong>Belajar sesuai kemampuanmu</strong></li>									
										</ul>
									</div>
								</div>
								<div class="video-wrap">
									<video poster="{{url('/')}}/assets/frontend/canvas/images/videos/explore.jpg" preload="auto" loop autoplay muted>
										<source src='{{url('/')}}/assets/frontend/canvas/images/videos/explore.mp4' type='video/mp4' />
										<source src='{{url('/')}}/assets/frontend/canvas/images/videos/explore.webm' type='video/webm' />
									</video>
									<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
								</div>
							</div>

							<div class="swiper-slide dark" style="background-image: url('{{url('/')}}/photos/lalith-baf.jpg');">
								<div class="container clearfix">
									<div class="slider-caption slider-caption-center">
										<h3 style="font-size: 28pt;" data-animate="fadeInUp">3 langkah untuk lulus ujian</h3>
										<ul style="list-style: none;">
											<li><strong>Materi belajar (Power point dan video)</strong></li>
											<li><strong>Tutor Online-(20 jam)</strong></li>
											<li><strong>Revisi pertanyaan</strong></li>														
										</ul>
									</div>
								</div>
								<div class="video-wrap">
									<video poster="{{url('/')}}/assets/frontend/canvas/images/videos/explore.jpg" preload="auto" loop autoplay muted>
										<source src='{{url('/')}}/assets/frontend/canvas/images/videos/explore.mp4' type='video/mp4' />
										<source src='{{url('/')}}/assets/frontend/canvas/images/videos/explore.webm' type='video/webm' />
									</video>
									<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
								</div>
							</div>
						@endif

					</div>
					<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
					<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
					
				</div>

			</div>

		</section>
@stop