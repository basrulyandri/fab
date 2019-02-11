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
					<div class="container clearfix">
						<h3><span>{{trans('msg.register_call_to_action')}}</span></h3>
						<span>{{trans('msg.register_call_to_action_message')}}</span>
						<a href="{{route('page.courses')}}" class="button button-dark button-xlarge button-rounded">{{trans('msg.go_to_courses')}}</a>
					</div>
				</div>
				<section id="section-about" class="page-section">
					<div class="container clearfix">


						<div class="heading-block center">
							<h2><span>The British Academy Of Finance</span></h2>
							<span>Will walk you though for success</span>
						</div>
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
						

						<div class="clear"></div>

					</div>

					<div class="section dark parallax nobottommargin" style="padding: 80px 0;background-image: url('{{url('/')}}/assets/frontend/canvas/images/baf/1.jpg');" data-bottom-top="background-position:0px 100px;" data-top-bottom="background-position:0px -300px;">

						<div class="container clearfix">

							<div class="col_one_third nobottommargin center" data-animate="bounceIn">
								<i class="i-plain i-xlarge divcenter nobottommargin icon-user-graduate"></i>
								<div class="counter counter-lined"><span data-from="100" data-to="211" data-refresh-interval="50" data-speed="2000"></span>+</div>
								<h5>Students</h5>
							</div>

							<div class="col_one_third nobottommargin center" data-animate="bounceIn" data-delay="200">
								<i class="i-plain i-xlarge divcenter nobottommargin icon-handshake"></i>
								<div class="counter counter-lined"><span data-from="1" data-to="35" data-refresh-interval="100" data-speed="2500"></span>+</div>
								<h5>Partners</h5>
							</div>
							

							<div class="col_one_third nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
								<i class="i-plain i-xlarge divcenter nobottommargin icon-line2-book-open"></i>
								<div class="counter counter-lined"><span data-from="20" data-to="120" data-refresh-interval="30" data-speed="2700"></span>+</div>
								<h5>Modules</h5>
							</div>

						</div>

					</div>

				</section>

				<section id="section-work" class="page-section topmargin-lg">

					<div class="heading-block center">
						<h2>Our Courses</h2>						
					</div>

					<div class="container clearfix center">
							<div id="portfolio" class="portfolio grid-container portfolio-nomargin clearfix">
								@foreach($levels as $level)							
									<article class="portfolio-item pf-media pf-icons">
										<div class="portfolio-image">
											<a href="{{route('page.level.single',$level->slug)}}">
												<img src="{{$level->thumbnail}}" alt="{{$level->title}}">
											</a>
											<div class="portfolio-overlay">												
												<a href="{{route('page.level.single',$level->slug)}}" class="center-icon"><i class="icon-search"></i></a>
											</div>
										</div>
										<div class="portfolio-desc">
											<h3><a href="{{route('page.level.single',$level->slug)}}">CIMA {{$level->alias}}</a></h3>
										</div>
									</article>								
								@endforeach
							</div>								
					</div>

				</section>

				<section id="section-team" class="page-section topmargin-lg">

					<div class="heading-block center">
						<h2>Our Team</h2>
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
										<div class="team-title"><h4>Mr. Augustus Perera</h4></div>
										<div class="team-content">
											<p>A multi discipline professionally qualified individual with 15 years of corporate management experience</p>
											<p>He have worked with best in class consultants McKinsey USA, SIEMENS IN, KPMG CA, LeanCor USA and have Experience with Global Companies like GSK ( Life Science and Chemicals), M&S, G-Star, George ( Fashion & Apparel ), Uniliver ( FMCG ), Etisalat, Dialog ( Telecommunication ), Camso, Solideal ( Industrial goods ), Litro ( LPG Gas & Energy ) , Maldives Port / SLPA (Project Cargo ) are highlights among many other.</p>
										</div>										
									</div>
								</div>
							</div>													
						</div>
					</div>

					<div class="section parallax" style="background-image: url('{{url('/')}}/assets/frontend/canvas/images/baf/parallax-3.jpg'); padding: 100px 0;" data-bottom-top="background-position:0px 100px;" data-top-bottom="background-position:0px -100px;">
						<div class="heading-block center nobottomborder nobottommargin">
							<h2>It is a walk-though journey with us to acquire a globally recognized management accounting qualification.</h2>
						</div>
					</div>

				</section>

				<!-- <section id="section-services" class="page-section topmargin-lg">

					<div class="heading-block center bottommargin-lg">
						<h2>Services</h2>
						<span>List of some features included in Canvas.</span>
					</div>

					<div class="container clearfix">

						<div class="col_one_third">
							<div class="feature-box fbox-center fbox-effect nobottomborder" data-animate="fadeIn">
								<div class="fbox-icon">
									<a href="#"><i class="icon-phone2"></i></a>
								</div>
								<h3>Responsive Layout</h3>
								<p>Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
							</div>
						</div>

						<div class="col_one_third">
							<div class="feature-box fbox-center fbox-effect nobottomborder" data-animate="fadeIn" data-delay="200">
								<div class="fbox-icon">
									<a href="#"><i class="icon-eye"></i></a>
								</div>
								<h3>Retina Ready Graphics</h3>
								<p>Looks beautiful &amp; ultra-sharp on Retina Displays with Retina Icons, Fonts &amp; Images.</p>
							</div>
						</div>

						<div class="col_one_third col_last">
							<div class="feature-box fbox-center fbox-effect nobottomborder" data-animate="fadeIn" data-delay="400">
								<div class="fbox-icon">
									<a href="#"><i class="icon-star2"></i></a>
								</div>
								<h3>Powerful Performance</h3>
								<p>Optimized code that are completely customizable and deliver unmatched fast performance.</p>
							</div>
						</div>

						<div class="clear"></div>

						<div class="col_one_third">
							<div class="feature-box fbox-center fbox-effect nobottomborder" data-animate="fadeIn" data-delay="600">
								<div class="fbox-icon">
									<a href="#"><i class="icon-video"></i></a>
								</div>
								<h3>HTML5 Video</h3>
								<p>Canvas provides support for Native HTML5 Videos that can be added to a Full Width Background.</p>
							</div>
						</div>

						<div class="col_one_third">
							<div class="feature-box fbox-center fbox-effect nobottomborder" data-animate="fadeIn" data-delay="800">
								<div class="fbox-icon">
									<a href="#"><i class="icon-params"></i></a>
								</div>
								<h3>Parallax Support</h3>
								<p>Display your Content attractively using Parallax Sections that have unlimited customizable areas.</p>
							</div>
						</div>

						<div class="col_one_third col_last">
							<div class="feature-box fbox-center fbox-effect nobottomborder" data-animate="fadeIn" data-delay="1000">
								<div class="fbox-icon">
									<a href="#"><i class="icon-fire"></i></a>
								</div>
								<h3>Endless Possibilities</h3>
								<p>Complete control on each &amp; every element that provides endless customization possibilities.</p>
							</div>
						</div>

						<div class="clear"></div>

						<div class="col_one_third nobottommargin">
							<div class="feature-box fbox-center fbox-effect nobottomborder" data-animate="fadeIn" data-delay="1200">
								<div class="fbox-icon">
									<a href="#"><i class="icon-bulb"></i></a>
								</div>
								<h3>Light &amp; Dark Color Schemes</h3>
								<p>Change your Website's Primary Scheme instantly by simply adding the dark class to the body.</p>
							</div>
						</div>

						<div class="col_one_third nobottommargin">
							<div class="feature-box fbox-center fbox-effect nobottomborder" data-animate="fadeIn" data-delay="1400">
								<div class="fbox-icon">
									<a href="#"><i class="icon-heart2"></i></a>
								</div>
								<h3>Boxed &amp; Wide Layouts</h3>
								<p>Stretch your Website to the Full Width or make it boxed to surprise your visitors.</p>
							</div>
						</div>

						<div class="col_one_third nobottommargin col_last">
							<div class="feature-box fbox-center fbox-effect nobottomborder" data-animate="fadeIn" data-delay="1600">
								<div class="fbox-icon">
									<a href="#"><i class="icon-note"></i></a>
								</div>
								<h3>Extensive Documentation</h3>
								<p>We have covered each &amp; everything in our Documentation including Videos &amp; Screenshots.</p>
							</div>
						</div>

						<div class="clear"></div>

					</div>

					<div class="divider divider-short divider-center topmargin-lg"><i class="icon-star3"></i></div>

				</section> -->

				<!-- <section id="section-pricing" class="page-section topmargin-lg">

					<div class="heading-block center">
						<h2>Pricing</h2>
						<span>We offer Flexible Pricing Options.</span>
					</div>

					<div class="container clearfix">

						<div class="row pricing bottommargin clearfix">

							<div class="col-lg-3" data-animate="fadeInLeft">

								<div class="pricing-box">
									<div class="pricing-title">
										<h3>Starter</h3>
									</div>
									<div class="pricing-price">
										<span class="price-unit">&euro;</span>7<span class="price-tenure">/mo</span>
									</div>
									<div class="pricing-features">
										<ul>
											<li><strong>Full</strong> Access</li>
											<li><i class="icon-code"></i> Source Files</li>
											<li><strong>100</strong> User Accounts</li>
											<li><strong>1 Year</strong> License</li>
											<li>Phone &amp; Email Support</li>
										</ul>
									</div>
									<div class="pricing-action">
										<a href="#" class="btn btn-danger btn-block btn-lg">Sign Up</a>
									</div>
								</div>

							</div>

							<div class="col-lg-3" data-animate="fadeInDown"  data-delay="250">

								<div class="pricing-box best-price">
									<div class="pricing-title">
										<h3>Professional</h3>
										<span>Most Popular</span>
									</div>
									<div class="pricing-price">
										<span class="price-unit">&euro;</span>12<span class="price-tenure">/mo</span>
									</div>
									<div class="pricing-features">
										<ul>
											<li><strong>Full</strong> Access</li>
											<li><i class="icon-code"></i> Source Files</li>
											<li><strong>1000</strong> User Accounts</li>
											<li><strong>2 Years</strong> License</li>
											<li><i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i></li>
										</ul>
									</div>
									<div class="pricing-action">
										<a href="#" class="btn btn-danger btn-block btn-lg bgcolor border-color">Sign Up</a>
									</div>
								</div>

							</div>

							<div class="col-lg-3" data-animate="fadeInUp" data-delay="500">

								<div class="pricing-box">
									<div class="pricing-title">
										<h3>Business</h3>
									</div>
									<div class="pricing-price">
										<span class="price-unit">&euro;</span>19<span class="price-tenure">/mo</span>
									</div>
									<div class="pricing-features">
										<ul>
											<li><strong>Full</strong> Access</li>
											<li><i class="icon-code"></i> Source Files</li>
											<li><strong>500</strong> User Accounts</li>
											<li><strong>3 Years</strong> License</li>
											<li>Phone &amp; Email Support</li>
										</ul>
									</div>
									<div class="pricing-action">
										<a href="#" class="btn btn-danger btn-block btn-lg">Sign Up</a>
									</div>
								</div>

							</div>

							<div class="col-lg-3" data-animate="fadeInRight" data-delay="250">

								<div class="pricing-box">
									<div class="pricing-title">
										<h3>Enterprise</h3>
									</div>
									<div class="pricing-price">
										<span class="price-unit">&euro;</span>29<span class="price-tenure">/mo</span>
									</div>
									<div class="pricing-features">
										<ul>
											<li><strong>Full</strong> Access</li>
											<li><i class="icon-code"></i> Source Files</li>
											<li><strong>1000</strong> User Accounts</li>
											<li><strong>5 Years</strong> License</li>
											<li>Phone &amp; Email Support</li>
										</ul>
									</div>
									<div class="pricing-action">
										<a href="#" class="btn btn-danger btn-block btn-lg">Sign Up</a>
									</div>
								</div>

							</div>

						</div>

					</div>

				</section> -->

				<section id="section-testimonials" class="page-section section parallax dark" style="background-image: url('{{url('/')}}/assets/frontend/canvas/images/baf/me-parallax.jpg'); padding: 200px 0;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">

					<div class="container clearfix">

						<div class="col_half nobottommargin">&nbsp;</div>

						<div class="col_half nobottommargin col_last">

							<div class="heading-block center">
								<h4>What Students say ?</h4>
								<span>Some of our Students love us &amp; so we do!</span>
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

						</div>

					</div>

				</section>

				<section id="section-contact" class="page-section">

					<div class="heading-block title-center">
						<h2>Get in Touch with us</h2>
						<span>Still have Questions? Contact Us using the Form below.</span>
					</div>

					<div class="container clearfix">

						<!-- Contact Form
						============================================= -->
						<div class="col_half">

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


						</div><!-- Contact Form End -->

						<!-- Google Map
						============================================= -->
						<div class="col_half col_last">

							<section id="google-map" class="gmap" style="height: 410px;"></section>


						</div><!-- Google Map End -->

						<!-- Contact Info
						============================================= -->
						<div class="col_full nobottommargin clearfix">

							<div class="col_one_third">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-map-marker2"></i></a>
									</div>
									<h3>Address<span class="subtitle">Finance Tower 2, Lantai 33 Jl. Jend. Sudirman, Jakarta Selatan </span></h3>
								</div>
							</div>

							<div class="col_one_third">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-phone3"></i></a>
									</div>
									<h3>Call Us<span class="subtitle">{{getOption('theme_option_hotline')}}</span></h3>
								</div>
							</div>

							<div class="col_one_third col_last">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-email"></i></a>
									</div>
									<h3>Email<span class="subtitle">{{getOption('theme_option_email')}}</span></h3>
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
										<h2 data-animate="fadeInUp">Welcome to BAFStudies</h2>
										<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Will walk you though for success.</p>
									</div>
								</div>
							</div>
							<div class="swiper-slide dark">
								<div class="container clearfix">
									<div class="slider-caption slider-caption-center">
										<h2 data-animate="fadeInUp">Beautifully Flexible</h2>
										<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
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
							<div class="swiper-slide" style="background-image: url('{{url('/')}}/assets/frontend/canvas/images/slider/swiper/3.jpg'); background-position: center top;">
								<div class="container clearfix">
									<div class="slider-caption">
										<h2 data-animate="fadeInUp">Great Performance</h2>
										<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
									</div>
								</div>
							</div>
						@endif
						@if(\LaravelLocalization::getCurrentLocale() == 'id')
							<div class="swiper-slide dark" style="background-image: url('{{url('/')}}/photos/baf-silder-(2).jpg');">
								<div class="container clearfix">
									<div class="slider-caption slider-caption-center">
										<h2 data-animate="fadeInUp">Selamat Datang di BAFSTUDIES</h2>
										<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Will walk you though for success</p>
									</div>
								</div>
							</div>
							<div class="swiper-slide dark">
								<div class="container clearfix">
									<div class="slider-caption slider-caption-center">
										<h2 data-animate="fadeInUp">Beautifully Flexible</h2>
										<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
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
							<div class="swiper-slide" style="background-image: url('{{url('/')}}/assets/frontend/canvas/images/slider/swiper/3.jpg'); background-position: center top;">
								<div class="container clearfix">
									<div class="slider-caption">
										<h2 data-animate="fadeInUp">Great Performance</h2>
										<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
									</div>
								</div>
							</div>
						@endif

					</div>
					<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
					<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
					<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
				</div>

			</div>

		</section>
@stop