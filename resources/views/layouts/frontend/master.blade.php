<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{getOption('web_title')}} | @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<meta name="author" content="Basrul Yandri">
	@yield('og')
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/bootstrap-responsive.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/font-awesome-corp.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/font-awesome-ext.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/font-awesome-social.css">
	<!-- End Font Awesome -->
	<!-- Menu Styles -->
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/menu/core.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/menu/styles/lwhite.css">
	
	<!--[if (gt IE 9)|!(IE)]><!-->
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/menu/effects/fading.css" media="screen">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/menu/effects/slide.css" media="screen">
	<!--<![endif]-->
	<!-- End Menu Styles -->
	<!-- Revolution Slider -->
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/fullwidth.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/rs-plugin/css/settings.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/captions.css" media="screen" />
	<!-- End Revolution Slider -->
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/jquery.heroCarousel.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/prettify.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/docs.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/prettyPhoto.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/switcher.css">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/main.css?ver=6">
	<link rel="stylesheet" type="text/css" href="{{url('assets/frontend')}}/css/rollo-custom.css">	
	<link rel="stylesheet" href="{{url('assets/backend')}}/css/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,400italic|Arvo:400,400italic,700|Lato:400,700,400italic,900|Vollkorn:400,700,400italic|Ubuntu:400,400italic,500,700|Droid+Sans:400,700|Prociono|Lora:400,400italic,700|Merriweather:400,700|Bitter:400,400italic,700|Kreon:400,700|Raleway:400,600|Quicksand:400,700|Oswald:400,700,300|Source+Sans+Pro:400,400italic,600,700,900|Droid+Serif:400,700,400italic">	
	<!--[if IE]><link rel="stylesheet" type="text/css" href="css/ie.css"><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/font-awesome-ie7.min.css"><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/font-awesome-more-ie7.min.css"><![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="js/vendor/selectivizr.min.js"></script><![endif]-->
	<!--[if lt IE 9]><script type="text/javascript" src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/modernizr.min.js"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-116802175-3');
	</script>
	<link rel="shortcut icon" href="favicon.ico">
	@yield('header')
</head>
<body class="wide">
	<div class="layout">
		<!-- Main Header -->
		<header>
			<!-- Top Bar -->
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<div class="span10 hidden-phone">
						<nav>
						    <ul class="custom-nav">							
								@foreach(\Menu::getByName('Top') as $menu)								
									<li><a href="{{url('/')}}/{{$menu['link']}}" class="visible-desktop">{{\Harimayco\Menu\Models\MenuItems::find($menu['id'])->trans('label')}} @if(!empty($menu['child'])) <i class="icon-angle-down"></i> @endif</a>
										@if(!empty($menu['child']))
											<ul class="custom-nav">
												@foreach($menu['child'] as $child)
													<li>
													<a href="{{url('/')}}/{{$child['link']}}">
														{{\Harimayco\Menu\Models\MenuItems::find($child['id'])->trans('label')}} 
													</a>
														
													</a>
													@if(!empty($child['child']))
														<ul class="custom-nav">
															@foreach($child['child'] as $child2)
																<li><a href="{{url('/')}}/{{$child2['link']}}">{{\Harimayco\Menu\Models\MenuItems::find($child2['id'])->trans('label')}}</a></a></li>
															@endforeach
														</ul>										
													@endif
													</li>
												@endforeach
											</ul>	
											@endif
									</li>
								@endforeach	
							</ul>
						</nav>
						</div>
					
						<div class="span2">
							<!-- Access -->
							<ul class="access unstyled">								
								@if(!auth()->user())
								<li class="login-area"><a href="{{route('page.login')}}"><i class="icon-user"></i> {{trans('msg.login')}}</a>
								</li>
								@else
								<ul class="menu-top unstyled inline">
								<li class="parent"><a href="#">Hi {{auth()->user()->first_name}} <i class="icon-angle-down"></i></a>
									<!-- First Level -->
									<ul class="unstyled">
										<li><a href="{{route('dashboard.index')}}"><i class="icon-diamond"></i> Dashboard</a></li>										
										<li><a href="{{route('auth.logout')}}"><i class="icon-sign-out"></i> {{trans('msg.logout')}}</a></li>										
									</ul>
									<!-- End First Level -->
								</li>								
							</ul>
								@endif
							</ul>
							<!-- End Access -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Top Bar -->
			<!-- Header -->
			<div class="header">
				<div class="container">
					<div class="row">
						<div class="span4">
							<!-- Logo -->
							<div class="logo">
								<a href="{{route('page.index')}}"><img id="logo" src="{{url('/').getOption('theme_option_logo')}}" alt="{{getOption('web_title')}}"></a>								
							</div>
							<!-- End Logo -->
						</div>
						<div class="span8">
							<br class="hidden-phone">
							<div class="pull-right">
								<h2 class="text-info"><a href="https://api.whatsapp.com/send?phone={{getOption('theme_option_hotline')}}&text=Halo%20BAF"><img style="width:30px;" src="{{url('/assets/frontend/images')}}/whatsapp-icon-min.png"></span> +{{getOption('theme_option_hotline')}}</a></h2>
								<!-- Social Widget -->
							<ul class="social-icons social-dark inline">
								@if(getOption('theme_option_facebook_url') !='')
									<li><a target="_blank" href="{{getOption('theme_option_facebook_url')}}" data-toggle="tooltip" title="" class="facebook" data-original-title="Facebook"><i class="icon-facebook"></i></a></li>
								@endif
								@if(getOption('theme_option_twitter_url') !='')
									<li><a target="_blank" href="{{getOption('theme_option_twitter_url')}}" data-toggle="tooltip" title="" class="twitter" data-original-title="Twitter"><i class="icon-twitter"></i></a></li>
								@endif

								@if(getOption('theme_option_instagram_url') !='')
									<li><a target="_blank" href="{{getOption('theme_option_instagram_url')}}" data-toggle="tooltip" title="" class="twitter" data-original-title="instagram"><i class="icon-instagram"></i></a></li>
								@endif
								@if(getOption('theme_option_linkedin_url') !='')
									<li><a target="_blank" href="{{getOption('theme_option_linkedin_url')}}" data-toggle="tooltip" title="" class="twitter" data-original-title="linkedin"><i class="icon-linkedin"></i></a></li>
								@endif

								@if(getOption('theme_option_youtube_url') !='')
									<li><a target="_blank" href="{{getOption('theme_option_youtube_url')}}" data-toggle="tooltip" title="" class="twitter" data-original-title="Youtube"><i class="icon-youtube"></i></a></li>
								@endif
								
							</ul>
							<!-- End Social Widget -->
							</div>
						</div>
					</div>
				</div>
			</div>			
			<!-- End Header -->
			@include('layouts.frontend._menu')
			@if(\Request::route()->getName() == 'page.index')
			<!-- Slideshow -->
			<div class="overall">
				<div class="inner">
					<!-- Hero Carousel -->
					<section class="hero">
						<div id="hero-carousel" class="hero-carousel">	
							@if(\LaravelLocalization::getCurrentLocale() == 'en')					
							<article>
								<img class="slider-image" src="{{url('/')}}/photos/cima-slider.jpg" alt="" />
								
								<div class="contents">
									<h2>What is your benefit ?</h2>
									<ol>
										<li><strong>Catch the eye of employers around the globe</strong></li>
										<li><strong>Choose your own role</strong></li>
										<li><strong>Earn higher salaries</strong></li>	
										<li><strong>Study at your own speed</strong></li>									
									</ol>
									<a class="btn btn-small btn-info" href="/cima-home">CIMA Home</a>
								</div>
							</article>
							<article>
								<img class="slider-image" src="{{url('/')}}/photos/lalith-baf.jpg" alt="" />
								
								<div class="contents">
									<h2>3 Steps to Pass The Exam</h2>
									<ol>
										<li>Study Material (Power point presentations and Videos)</li>
										<li>On-line Tutoring- (20 Hours)</li>
										<li>Revision Questions</li>
									</ol>
									<a class="btn btn-small btn-info" href="/courses">Go To Courses</a>
								</div>
							</article>

							<article>
								<img class="slider-image" src="{{url('/')}}/photos/baf-silder-(1).jpg" alt="" />
								
								<div class="contents">
									<h2>We Offer more than just CIMA study support</h2>
									<ol>
										<li>STUDY SUMMARIES</li>
										<li>24/7 SUPPORT</li>
										<li>LIVE SESSIONS</li>
										<li>INDIVIDUAL SESSIONS</li>
									</ol>
									<a class="btn btn-small btn-info" href="/courses">Getting Started</a>
								</div>
							</article>
							@endif

							@if(\LaravelLocalization::getCurrentLocale() == 'id')					
							<article>
								<img class="slider-image" src="{{url('/')}}/photos/cima-slider.jpg" alt="" />
								<div class="overlay"></div>
								<div class="contents" style="padding:10px;background-color:rgba(0, 0, 0, 0.5);">
									<h2>Apa Keuntunganmu ?</h2>
									<ol>
										<li><strong>Dikenal karyawan di seluruh dunia</strong></li>
										<li><strong>Pilih tugasmu sendiri</strong></li>
										<li><strong>Peluang gaji lebih besar</strong></li>	
										<li><strong>Belajar sesuai kemampuanmu sendiri</strong></li>									
									</ol>
									<a class="btn btn-large btn-info" href="/cima-home">Beranda CIMA</a>
								</div>
							</article>
							<article>
								<img class="slider-image" src="{{url('/')}}/photos/lalith-baf.jpg" alt="" />
								<div class="overlay"></div>
								<div class="contents" style="padding:10px;background-color:rgba(0, 0, 0, 0.5);">
									<h2>3 langkah lulus test CIMA</h2>
									<ol>
										<li>Materi belajar (Slide Powerpoint dan video)</li>
										<li>Belajar Online- (20 Jam)</li>
										<li>Pertanyaan revisi</li>
									</ol>
									<a class="btn btn-large btn-info" href="/courses">Ke halaman Kursus</a>
								</div>
							</article>

							<article>
								<img class="slider-image" src="{{url('/')}}/photos/baf-silder-(1).jpg" alt="" />
								<div class="overlay"></div>
								<div class="contents" style="padding:10px;background-color:rgba(0, 0, 0, 0.5);">
									<h2>Kami menawarkan lebih dari sekedar dukungan belajar dari CIMA</h2>
									<ol>
										<li>Rangkuman pengajaran</li>
										<li>Dukungan 24 jam</li>
										<li>Sesi siaran langsung</li>
										<li>Sesi individu</li>
									</ol>
									<a class="btn btn-large btn-info" href="/courses">Mulai belajar</a>
								</div>
							</article>
							@endif
						</div>
					</section>
					<!-- End Hero Carousel -->
				</div>
			</div>
			<!-- End Slideshow -->
			@endif
		</header>
		<!-- End Main Header -->
		@yield('content')
		<!-- Footer -->
		<div style="position: fixed;bottom: 10px;right: 10px;z-index: 1000; width:180px;">
					<div style="float: left;width:70%;">
						<div class="text-us" style="padding:15px;background-color: #fff;font-size: 14pt;font-weight: bold;border-top-right-radius: 50px;border-bottom-right-radius: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"><a target="_blank" href="https://api.whatsapp.com/send?phone={{getOption('theme_option_hotline')}}&text=Halo%20BAF">Chat Us</a>
						</div>											
					</div>
					<div style="float: left;width:30%;">
						<div class="chat-icon">
							<a target="_blank" href="https://api.whatsapp.com/send?phone={{getOption('theme_option_hotline')}}&text=Halo%20BAF">
								<img src="{{url('/assets/frontend/images')}}/whatsapp-icon-min.png" alt="" style="width:50px;">
							</a>				
						</div>						
					</div>			
		</div>
		<footer>
			<!-- Footer Block -->
			<div class="footer">
				<div class="container">
					<div class="row">
						<div class="span3">
							<!-- Logo -->
							<div class="logo">
								<a href="{{route('page.index')}}"><img id="logo-footer" src="{{url('/').getOption('theme_option_logo')}}" alt="City Nightlife" /></a>
							</div>
							<!-- End Logo -->
						</div>
						@include('layouts.frontend._footermenu')
						<div class="span3">
							<!-- About us -->
							<h3><i class="icon-book"></i> {{trans('msg.about_us')}}</h3>
							<p>{{trans('app.baf_description')}}</a>.</p>							
							<address>
								<strong>Address</strong><br>
								<i class="icon-map-marker"></i> {{getOption('theme_option_address')}}<br>
								<i class="icon-mobile-phone"></i> {{getOption('theme_option_hotline')}} <br>
								<i class="icon-envelope"></i> {{getOption('theme_option_email')}}
							</address>
							<!-- End About us -->
						</div>
						<div class="span4">
							
							
							<ul class="social-icons inline">
								@if(getOption('theme_option_facebook_url') !='')
									<li><a target="_blank" href="{{getOption('theme_option_facebook_url')}}" data-toggle="tooltip" title="" class="facebook" data-original-title="Facebook"><i class="icon-facebook"></i></a></li>
								@endif
								@if(getOption('theme_option_twitter_url') !='')
									<li><a target="_blank" href="{{getOption('theme_option_twitter_url')}}" data-toggle="tooltip" title="" class="twitter" data-original-title="Twitter"><i class="icon-twitter"></i></a></li>
								@endif

								@if(getOption('theme_option_instagram_url') !='')
									<li><a target="_blank" href="{{getOption('theme_option_instagram_url')}}" data-toggle="tooltip" title="" class="twitter" data-original-title="instagram"><i class="icon-instagram"></i></a></li>
								@endif
								@if(getOption('theme_option_linkedin_url') !='')
									<li><a target="_blank" href="{{getOption('theme_option_linkedin_url')}}" data-toggle="tooltip" title="" class="twitter" data-original-title="linkedin"><i class="icon-linkedin"></i></a></li>
								@endif

								@if(getOption('theme_option_youtube_url') !='')
									<li><a target="_blank" href="{{getOption('theme_option_youtube_url')}}" data-toggle="tooltip" title="" class="twitter" data-original-title="twitter"><i class="icon-youtube"></i></a></li>
								@endif
							</ul>
							<!-- End Social Widget -->
							<!-- Social Buttons Widget -->
							
							<!-- End Social Buttons Widget -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Block -->
			<!-- Copyright -->
			
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="span6">
							<p>
								Copyright &copy; 2018 BAF - All Rights Reserved. <span class="author">Powered by <a href="http://rolloic.com">Rollo ITC</a>.</span>
							</p>
						</div>
						<div class="span6">							
						</div>
					</div>
				</div>
			</div>
			<!-- End Copyright -->
		</footer>
		<!-- End Footer -->
	</div>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.easing.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/css/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/css/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.heroCarousel.min.js"></script>
	<script type="text/javascript">
		
		/* <![CDATA[ */
		jQuery.noConflict();

		(function ($) {
			/**
			 * Hero Carousel
			 */
			var heroCarousel = {
				init: function() {
					var carousel = $('.hero-carousel');

					carousel.each(function () {
						$(this).heroCarousel({
							animationSpeed: 3000,
							navigation: true,
							easing: 'easeOutExpo',
							timeout: 5000,
							pause: true,
							pauseOnNavHover: true,
							prevText: '<i class="icon-chevron-left"></i>',
							nextText: '<i class="icon-chevron-right"></i>',
							css3pieFix: false,
							currentClass: 'current'
						});
					});
				}
			};

			var onReady = {
				init: function() {
					if ($.fn.heroCarousel) {
						heroCarousel.init();
					}
				}
			};

			var onResize = {
				init: function() {
					if ($.fn.heroCarousel) {
						heroCarousel.init();
					}
				}
			};

			$(document).ready(onReady.init);
			$(window).resize(onResize.init);
		})(jQuery);
		/* ]]> */
	
	</script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.flexslider.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.parallax.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.waypoints.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/effects.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.fitvids.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.prettyPhoto.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.qrcode.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/vendor/jquery.cookie.min.js"></script>
	<!--[if lte IE 9]>
		<script type="text/javascript" src="js/vendor/jquery.placeholder.min.js"></script>
		<script type="text/javascript" src="js/vendor/jquery.menu.min.js"></script>
		<script type="text/javascript">
			/* <![CDATA[ */
			$(function() {
				$('#nav .menu').menu({'effect' : 'fade'});
			});
			/* ]]> */
		</script>
	<![endif]-->	
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/plugins.js"></script>
	<script type="text/javascript" src="{{url('assets/backend')}}/js/plugins/toastr/toastr.min.js"></script>
	<script type="text/javascript" src="{{url('assets/frontend')}}/js/main.js"></script>
	@yield('footer')
</body>
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
</html>
