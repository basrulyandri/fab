<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/canvas/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/canvas/style.css" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/canvas/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/canvas/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/canvas/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/canvas/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/canvas/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/canvas/css/responsive.css" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/assets/frontend/canvas/css/rollo-custom.css" type="text/css" />
	<link rel="stylesheet" href="{{url('assets/backend')}}/css/plugins/toastr/toastr.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	@yield('og')

	<!-- Document Title
	============================================= -->
	<title>{{getOption('web_title')}} | @yield('title')</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<div id="home" class="page-section" style="position:absolute;top:0;left:0;width:100%;height:200px;z-index:-2;"></div>

		@yield('slider')

		<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="{{route('page.index')}}" class="standard-logo" data-dark-logo="{{url('/')}}/assets/frontend/canvas/images/logo-dark.png"><img src="{{url('/').getOption('theme_option_logo')}}" alt="{{getOption('web_title')}} logo"></a>
						<a href="{{route('page.index')}}" class="retina-logo" data-dark-logo="{{url('/')}}/assets/frontend/canvas/images/logo-dark@2x.png"><img src="{{url('/').getOption('theme_option_logo')}}" alt="{{getOption('web_title')}} Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">
						@if(request()->route()->getName() == 'page.index')
							<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1500">
								<li><a href="{{route('page.index')}}"><div>{{trans('app.home')}}</div></a></li>
								<li><a href="#" data-href="#section-about"><div>{{trans('app.about')}}</div></a></li>
								<li><a href="#" data-href="#section-work"><div>{{trans('app.courses')}}</div></a></li>
								<li><a href="/cima-syllabus"><div>{{trans('app.cima_syllabus')}}</div></a></li>
								<li><a href="#" data-href="#section-testimonials" data-offset="60"><div>{{trans('app.testimonials')}}</div></a></li>
								<li><a href="/exam-dates"><div>{{trans('app.exam_dates')}}</div></a></li>
								<li><a href="#"><div>{{trans('app.partnership_affiliate')}}</div></a></li>								
								<!-- <li><a href="#" data-href="#section-services"><div>Services</div></a></li>
								<li><a href="#" data-href="#section-pricing"><div>Pricing</div></a></li>
								<li><a href="blog.html"><div>Blog</div></a></li> -->
								<li><a href="#" data-href="#section-contact"><div>{{trans('app.contact')}}</div></a></li>
								<li><a href="{{route('page.basket')}}"><div>{{trans('app.basket')}}</div></a></li>
							</ul>
						@else
							<ul data-easing="easeInOutExpo" data-speed="1500">
								<li><a href="{{route('page.index')}}"><div>{{trans('app.home')}}</div></a></li>
								<li><a href="{{route('page.index')}}#section-about" data-href="{{route('page.index')}}#section-about"><div>{{trans('app.about')}}</div></a></li>
								<li><a href="{{route('page.index')}}#section-work" data-href="{{route('page.index')}}#section-work"><div>{{trans('app.courses')}}</div></a></li>
								<li><a href="/cima-syllabus"><div>{{trans('app.cima_syllabus')}}</div></a></li>								
								<li><a href="{{route('page.index')}}#section-testimonials" data-href="{{route('page.index')}}#section-testimonials" data-offset="60"><div>{{trans('app.testimonials')}}</div></a></li>
								<li><a href="/exam-dates"><div>{{trans('app.exam_dates')}}</div></a></li>
								<li><a href="{{route('page.index')}}#"><div>{{trans('app.partnership_affiliate')}}</div></a></li>
								<li><a href="{{route('page.index')}}#section-contact" data-href="{{route('page.index')}}#section-contact"><div>{{trans('app.contact')}}</div></a></li>
								<li><a href="{{route('page.basket')}}"><div>{{trans('app.basket')}}</div></a></li>
							</ul>
						@endif
						
						<div id="top-cart">
							<a href="#" id="top-cart-trigger">
								@if( LaravelLocalization::getCurrentLocale() == 'en')
									EN </a>
								@endif
								@if( LaravelLocalization::getCurrentLocale() == 'id')
									ID </a>
								@endif
							<div class="top-cart-content">	
								<div class="top-cart-title">
									<h4>{{trans('msg.select_language')}}</h4>
								</div>							
								<div class="top-cart-items">
									<div class="top-cart-item clearfix">
										<div class="top-cart-item-image">
											<a href="{{ \LaravelLocalization::getLocalizedURL('en', url()->current()) }}"><img src="{{asset('assets/frontend/canvas/images/flags/us.png')}}"></a>
										</div>
										<div class="top-cart-item-desc">
											<a href="{{ \LaravelLocalization::getLocalizedURL('en', url()->current()) }}">English</a>											
										</div>
									</div>

									<div class="top-cart-item clearfix">
										<div class="top-cart-item-image">
											<a href="{{ \LaravelLocalization::getLocalizedURL('en', url()->current()) }}"><img src="{{asset('assets/frontend/canvas/images/flags/id.png')}}"></a>
										</div>
										<div class="top-cart-item-desc">
											<a href="{{ \LaravelLocalization::getLocalizedURL('id', url()->current()) }}">Indonesia</a>											
										</div>
									</div>
									
								</div>								
							</div>
						</div>
						
						<!-- Top Search
						============================================= -->
						<!-- <div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div> -->
						<!-- #top-search end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<div class="clear"></div>

		@yield('content')
		
		<div style="position: fixed;bottom: 25px;right: 80px;z-index: 1000; width:180px;">
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
		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_two_third">

						<div class="col_two_third">

							<div class="widget clearfix">

								<img src="{{url('/').getOption('theme_option_logo')}}" alt="" class="{{getOption('web_title')}}">
								

								<div style="background: url('{{url('/')}}/assets/frontend/canvas/images/world-map.png') no-repeat center center; background-size: 100%;">
									<address>
										<strong>{{trans('app.address')}}</strong><br>
										{{getOption('theme_option_address')}}
									</address>
									<abbr title="Phone Number"><strong>{{trans('app.phone')}}:</strong></abbr> {{getOption('theme_option_hotline')}}<br>									
									<abbr title="Email Address"><strong>Email:</strong></abbr> {{getOption('theme_option_email')}}
								</div>

							</div>

						</div>

						<div class="col_one_third col_last">

							<div class="widget widget_links clearfix">

								<h4>Menu</h4>
								<ul>
								@foreach(\Menu::getByName('Footer 1') as $menu)									
									<li><a href="{{$menu['link']}}"><i class="fa fa-plus"></i>{{\Harimayco\Menu\Models\MenuItems::find($menu['id'])->trans('label')}}</a></li>
								@endforeach	
									<!-- <li><a href="http://codex.wordpress.org/">Documentation</a></li>
									<li><a href="http://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
									<li><a href="http://wordpress.org/extend/plugins/">Plugins</a></li>
									<li><a href="http://wordpress.org/support/">Support Forums</a></li>
									<li><a href="http://wordpress.org/extend/themes/">Themes</a></li>
									<li><a href="http://wordpress.org/news/">WordPress Blog</a></li>
									<li><a href="http://planet.wordpress.org/">WordPress Planet</a></li> -->
								</ul>

							</div>

						</div>

						

					</div>

					<div class="col_one_third col_last">					

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-lg-6 clearfix bottommargin-sm">
									<a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a href="{{getOption('theme_option_facebook_url')}}"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
								</div>
								<div class="col-lg-6 clearfix">
									<a href="#" class="social-icon si-dark si-colored si-twitter nobottommargin" style="margin-right: 10px;">
										<i class="icon-twitter"></i>
										<i class="icon-twitter"></i>
									</a>
									<a href="{{getOption('theme_option_twitter_url')}}"><small style="display: block; margin-top: 3px;"><strong>Follow</strong><br>Our Twitter</small></a>
								</div>

							</div>

						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2019 {{getOption('web_title')}}<br>						
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="{{getOption('theme_option_facebook_url')}}" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="{{getOption('theme_option_twitter_url')}}" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>							
						</div>						
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="{{url('/')}}/assets/frontend/canvas/js/jquery.js"></script>
	<script src="{{url('/')}}/assets/frontend/canvas/js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{url('/')}}/assets/frontend/canvas/js/functions.js"></script>
	<script type="text/javascript" src="{{url('assets/backend')}}/js/plugins/toastr/toastr.min.js"></script>

	<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyCb-tr8ZOXJOFS7N8BqLxLgDo6WqW9FqEM"></script> -->
	<script src="{{url('/')}}/assets/frontend/canvas/js/jquery.gmap.js"></script>

	<script>

		jQuery('#google-map').gMap({

			address: 'Melbourne, Australia',
			maptype: 'ROADMAP',
			zoom: 14,
			markers: [
				{
					address: "Melbourne, Australia",
					html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Envato</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
					icon: {
						image: "{{url('/')}}/assets/frontend/canvas/images/icons/map-icon-red.png",
						iconsize: [32, 39],
						iconanchor: [32,39]
					}
				}
			],
			doubleclickzoom: false,
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: false,
				streetViewControl: false,
				overviewMapControl: false
			}

		});
	</script>
	@yield('footer')

</body>
</html>