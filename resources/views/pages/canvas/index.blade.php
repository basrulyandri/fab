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
						<h3><span>Ready to register?</span></h3>
						<span>Register as a student today and start studying with CIMA !</span>
						<a href="#" class="button button-dark button-xlarge button-rounded">Go to courses</a>
					</div>
				</div>
				<section id="section-about" class="page-section">
					<div class="container clearfix">


						<div class="heading-block center">
							<h2><span>British Academy Of Finance</span></h2>
							<span>Will walk you though for success</span>
						</div>

						<div class="col_one_third nobottommargin">
							<div class="feature-box media-box">
								<div class="fbox-media">
									<img src="{{url('/')}}/assets/frontend/canvas/images/services/1.jpg" alt="Why choose Us?">
								</div>
								<div class="fbox-desc">
									<h3>Why choose Us.<span class="subtitle">Because we are Reliable.</span></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi rem, facilis nobis voluptatum est voluptatem accusamus molestiae eaque perspiciatis mollitia.</p>
								</div>
							</div>
						</div>

						<div class="col_one_third nobottommargin">
							<div class="feature-box media-box">
								<div class="fbox-media">
									<img src="{{url('/')}}/assets/frontend/canvas/images/services/2.jpg" alt="Why choose Us?">
								</div>
								<div class="fbox-desc">
									<h3>Our Mission.<span class="subtitle">To Redefine your Brand.</span></h3>
									<p>Quos, non, esse eligendi ab accusantium voluptatem. Maxime eligendi beatae, atque tempora ullam. Vitae delectus quia, consequuntur rerum molestias quo.</p>
								</div>
							</div>
						</div>

						<div class="col_one_third nobottommargin col_last">
							<div class="feature-box media-box">
								<div class="fbox-media">
									<img src="{{url('/')}}/assets/frontend/canvas/images/services/3.jpg" alt="Why choose Us?">
								</div>
								<div class="fbox-desc">
									<h3>What we Do.<span class="subtitle">Make our Customers Happy.</span></h3>
									<p>Porro repellat vero sapiente amet vitae quibusdam necessitatibus consectetur, labore totam. Accusamus perspiciatis asperiores labore esse ab accusantium ea modi ut.</p>
								</div>
							</div>
						</div>

						<div class="clear"></div>

					</div>

					<div class="section dark parallax nobottommargin" style="padding: 80px 0;background-image: url('{{url('/')}}/assets/frontend/canvas/images/parallax/1.jpg');" data-bottom-top="background-position:0px 100px;" data-top-bottom="background-position:0px -300px;">

						<div class="container clearfix">

							<div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
								<i class="i-plain i-xlarge divcenter nobottommargin icon-code"></i>
								<div class="counter counter-lined"><span data-from="100" data-to="846" data-refresh-interval="50" data-speed="2000"></span>K+</div>
								<h5>Lines of Codes</h5>
							</div>

							<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
								<i class="i-plain i-xlarge divcenter nobottommargin icon-magic"></i>
								<div class="counter counter-lined"><span data-from="3000" data-to="15360" data-refresh-interval="100" data-speed="2500"></span>+</div>
								<h5>KBs of HTML Files</h5>
							</div>

							<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
								<i class="i-plain i-xlarge divcenter nobottommargin icon-file-text"></i>
								<div class="counter counter-lined"><span data-from="10" data-to="386" data-refresh-interval="25" data-speed="3500"></span>*</div>
								<h5>No. of Templates</h5>
							</div>

							<div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
								<i class="i-plain i-xlarge divcenter nobottommargin icon-time"></i>
								<div class="counter counter-lined"><span data-from="60" data-to="1200" data-refresh-interval="30" data-speed="2700"></span>+</div>
								<h5>Hours of Coding</h5>
							</div>

						</div>

					</div>

				</section>

				<section id="section-work" class="page-section topmargin-lg">

					<div class="heading-block center">
						<h2>Our Works</h2>
						<span>Some of the Awesome Projects we've worked on.</span>
					</div>

					<div class="container clearfix center">

						<!-- Portfolio Items
						============================================= -->
						<div id="portfolio" class="portfolio grid-container portfolio-nomargin clearfix">

							<article class="portfolio-item pf-media pf-icons">
								<div class="portfolio-image">
									<a href="portfolio-single.html">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/1.jpg" alt="Open Imagination">
									</a>
									<div class="portfolio-overlay">
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/1.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
										<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single.html">Open Imagination</a></h3>
									<span><a href="#">Media</a>, <a href="#">Icons</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-illustrations">
								<div class="portfolio-image">
									<a href="portfolio-single.html">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/2.jpg" alt="Locked Steel Gate">
									</a>
									<div class="portfolio-overlay">
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/2.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
										<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single.html">Locked Steel Gate</a></h3>
									<span><a href="#">Illustrations</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-graphics pf-uielements">
								<div class="portfolio-image">
									<a href="#">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/3.jpg" alt="Mac Sunglasses">
									</a>
									<div class="portfolio-overlay">
										<a href="http://vimeo.com/89396394" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
										<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single-video.html">Mac Sunglasses</a></h3>
									<span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-icons pf-illustrations">
								<div class="portfolio-image">
									<a href="#">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/4.jpg" alt="Mac Sunglasses">
									</a>
									<div class="portfolio-overlay" data-lightbox="gallery">
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/4.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/4-1.jpg" class="hidden" data-lightbox="gallery-item"></a>
										<a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single-gallery.html">Morning Dew</a></h3>
									<span><a href="#">Icons</a>, <a href="#">Illustrations</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-uielements pf-media">
								<div class="portfolio-image">
									<a href="portfolio-single.html">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/5.jpg" alt="Console Activity">
									</a>
									<div class="portfolio-overlay">
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/5.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
										<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single.html">Console Activity</a></h3>
									<span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-graphics pf-illustrations">
								<div class="portfolio-image">
									<a href="#">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/6.jpg" alt="Mac Sunglasses">
									</a>
									<div class="portfolio-overlay" data-lightbox="gallery">
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/6.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/6-1.jpg" class="hidden" data-lightbox="gallery-item"></a>
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/6-2.jpg" class="hidden" data-lightbox="gallery-item"></a>
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/6-3.jpg" class="hidden" data-lightbox="gallery-item"></a>
										<a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single-gallery.html">Shake It!</a></h3>
									<span><a href="#">Illustrations</a>, <a href="#">Graphics</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-uielements pf-icons">
								<div class="portfolio-image">
									<a href="portfolio-single-video.html">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/7.jpg" alt="Backpack Contents">
									</a>
									<div class="portfolio-overlay">
										<a href="http://www.youtube.com/watch?v=kuceVNBTJio" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
										<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single-video.html">Backpack Contents</a></h3>
									<span><a href="#">UI Elements</a>, <a href="#">Icons</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-graphics">
								<div class="portfolio-image">
									<a href="portfolio-single.html">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/8.jpg" alt="Sunset Bulb Glow">
									</a>
									<div class="portfolio-overlay">
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/8.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
										<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single.html">Sunset Bulb Glow</a></h3>
									<span><a href="#">Graphics</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-illustrations pf-icons">
								<div class="portfolio-image">
									<a href="#">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/9.jpg" alt="Mac Sunglasses">
									</a>
									<div class="portfolio-overlay" data-lightbox="gallery">
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/9.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/9-1.jpg" class="hidden" data-lightbox="gallery-item"></a>
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/9-2.jpg" class="hidden" data-lightbox="gallery-item"></a>
										<a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single.html">Bridge Side</a></h3>
									<span><a href="#">Illustrations</a>, <a href="#">Icons</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-graphics pf-media pf-uielements">
								<div class="portfolio-image">
									<a href="portfolio-single-video.html">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/10.jpg" alt="Study Table">
									</a>
									<div class="portfolio-overlay">
										<a href="http://vimeo.com/91973305" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
										<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single-video.html">Study Table</a></h3>
									<span><a href="#">Graphics</a>, <a href="#">Media</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-media pf-icons">
								<div class="portfolio-image">
									<a href="portfolio-single.html">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/11.jpg" alt="Workspace Stuff">
									</a>
									<div class="portfolio-overlay">
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/11.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
										<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single.html">Workspace Stuff</a></h3>
									<span><a href="#">Media</a>, <a href="#">Icons</a></span>
								</div>
							</article>

							<article class="portfolio-item pf-illustrations pf-graphics">
								<div class="portfolio-image">
									<a href="#">
										<img src="{{url('/')}}/assets/frontend/canvas/images/portfolio/4/12.jpg" alt="Mac Sunglasses">
									</a>
									<div class="portfolio-overlay" data-lightbox="gallery">
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/12.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="{{url('/')}}/assets/frontend/canvas/images/portfolio/full/12-1.jpg" class="hidden" data-lightbox="gallery-item"></a>
										<a href="portfolio-single-gallery.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="portfolio-single-gallery.html">Fixed Aperture</a></h3>
									<span><a href="#">Illustrations</a>, <a href="#">Graphics</a></span>
								</div>
							</article>

						</div><!-- #portfolio end -->

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
										<img src="{{url('/')}}/assets/frontend/canvas/images/team/3.jpg" alt="John Doe">
									</div>
									<div class="team-desc">
										<div class="team-title"><h4>John Doe</h4><span>CEO</span></div>
										<div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat assumenda similique unde mollitia.</div>
										<a href="#" class="social-icon si-rounded si-small si-facebook">
											<i class="icon-facebook"></i>
											<i class="icon-facebook"></i>
										</a>
										<a href="#" class="social-icon si-rounded si-small si-twitter">
											<i class="icon-twitter"></i>
											<i class="icon-twitter"></i>
										</a>
										<a href="#" class="social-icon si-rounded si-small si-gplus">
											<i class="icon-gplus"></i>
											<i class="icon-gplus"></i>
										</a>
									</div>
								</div>

							</div>

							<div class="col-lg-6 bottommargin">

								<div class="team team-list clearfix">
									<div class="team-image">
										<img src="{{url('/')}}/assets/frontend/canvas/images/team/4.jpg" alt="Nix Maxwell">
									</div>
									<div class="team-desc">
										<div class="team-title"><h4>Nix Maxwell</h4><span>Co-Founder</span></div>
										<div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat assumenda similique unde mollitia.</div>
										<a href="#" class="social-icon si-rounded si-small si-forrst">
											<i class="icon-forrst"></i>
											<i class="icon-forrst"></i>
										</a>
										<a href="#" class="social-icon si-rounded si-small si-skype">
											<i class="icon-skype"></i>
											<i class="icon-skype"></i>
										</a>
										<a href="#" class="social-icon si-rounded si-small si-flickr">
											<i class="icon-flickr"></i>
											<i class="icon-flickr"></i>
										</a>
									</div>
								</div>

							</div>

							<div class="w-100"></div>

							<div class="col-lg-6 bottommargin">

								<div class="team team-list clearfix">
									<div class="team-image">
										<img src="{{url('/')}}/assets/frontend/canvas/images/team/2.jpg" alt="Josh Clark">
									</div>
									<div class="team-desc">
										<div class="team-title"><h4>Josh Clark</h4><span>Developer</span></div>
										<div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat assumenda similique unde mollitia.</div>
										<a href="#" class="social-icon si-rounded si-small si-dribbble">
											<i class="icon-dribbble"></i>
											<i class="icon-dribbble"></i>
										</a>
										<a href="#" class="social-icon si-rounded si-small si-twitter">
											<i class="icon-twitter"></i>
											<i class="icon-twitter"></i>
										</a>
										<a href="#" class="social-icon si-rounded si-small si-github">
											<i class="icon-github"></i>
											<i class="icon-github"></i>
										</a>
									</div>
								</div>

							</div>

							<div class="col-lg-6 bottommargin">

								<div class="team team-list clearfix">
									<div class="team-image">
										<img src="{{url('/')}}/assets/frontend/canvas/images/team/8.jpg" alt="Mary Jane">
									</div>
									<div class="team-desc">
										<div class="team-title"><h4>Mary Jane</h4><span>Support</span></div>
										<div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat assumenda similique unde mollitia.</div>
										<a href="#" class="social-icon si-rounded si-small si-facebook">
											<i class="icon-facebook"></i>
											<i class="icon-facebook"></i>
										</a>
										<a href="#" class="social-icon si-rounded si-small si-linkedin">
											<i class="icon-linkedin"></i>
											<i class="icon-linkedin"></i>
										</a>
										<a href="#" class="social-icon si-rounded si-small si-twitter">
											<i class="icon-twitter"></i>
											<i class="icon-twitter"></i>
										</a>
									</div>
								</div>

							</div>
						</div>

						<div class="clear"></div>

						<div class="fancy-title title-border title-center topmargin-sm">
							<h4>Skills we are Perfect in</h4>
						</div>

						<div class="col_one_fourth nobottommargin center">
							<div class="rounded-skill" data-color="#D01C1C" data-size="150" data-percent="90" data-width="2" data-animate="3000">
								<div class="counter counter-inherit"><span data-from="1" data-to="90" data-refresh-interval="50" data-speed="3000"></span>%</div>
							</div>
							<h5>HTML5</h5>
						</div>

						<div class="col_one_fourth nobottommargin center">
							<div class="rounded-skill" data-color="#1770A4" data-size="150" data-percent="75" data-width="2" data-animate="3000">
								<div class="counter counter-inherit"><span data-from="1" data-to="75" data-refresh-interval="50" data-speed="3000"></span>%</div>
							</div>
							<h5>CSS3</h5>
						</div>

						<div class="col_one_fourth nobottommargin center">
							<div class="rounded-skill" data-color="#6A89AA" data-size="150" data-percent="85" data-width="2" data-animate="3000">
								<div class="counter counter-inherit"><span data-from="1" data-to="85" data-refresh-interval="50" data-speed="3000"></span>%</div>
							</div>
							<h5>PHP</h5>
						</div>

						<div class="col_one_fourth nobottommargin center col_last">
							<div class="rounded-skill" data-color="#248673" data-size="150" data-percent="80" data-width="2" data-animate="3000">
								<div class="counter counter-inherit"><span data-from="1" data-to="80" data-refresh-interval="50" data-speed="3000"></span>%</div>
							</div>
							<h5>jQuery</h5>
						</div>

					</div>

					<div class="section parallax" style="background-image: url('{{url('/')}}/assets/frontend/canvas/images/parallax/3.jpg'); padding: 100px 0;" data-bottom-top="background-position:0px 100px;" data-top-bottom="background-position:0px -100px;">
						<div class="heading-block center nobottomborder nobottommargin">
							<h2>"Everything is designed, but some things are designed well."</h2>
						</div>
					</div>

				</section>

				<section id="section-services" class="page-section topmargin-lg">

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

				</section>

				<section id="section-pricing" class="page-section topmargin-lg">

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

				</section>

				<section id="section-testimonials" class="page-section section parallax dark" style="background-image: url('{{url('/')}}/assets/frontend/canvas/images/about/me-parallax.jpg'); padding: 200px 0;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">

					<div class="container clearfix">

						<div class="col_half nobottommargin">&nbsp;</div>

						<div class="col_half nobottommargin col_last">

							<div class="heading-block center">
								<h4>What Clients say?</h4>
								<span>Some of our Clients love us &amp; so we do!</span>
							</div>

							<div class="fslider testimonial testimonial-full nobgcolor noborder noshadow nopadding" data-arrows="false">
								<div class="flexslider">
									<div class="slider-wrap">
										<div class="slide">
											<div class="testi-content">
												<p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
												<div class="testi-meta">
													Steve Jobs
													<span>Apple Inc.</span>
												</div>
											</div>
										</div>
										<div class="slide">
											<div class="testi-content">
												<p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
												<div class="testi-meta">
													Collis Ta'eed
													<span>Envato Inc.</span>
												</div>
											</div>
										</div>
										<div class="slide">
											<div class="testi-content">
												<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
												<div class="testi-meta">
													John Doe
													<span>XYZ Inc.</span>
												</div>
											</div>
										</div>
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

								<div class="col_two_third">
									<label for="template-contactform-subject">Subject <small>*</small></label>
									<input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
								</div>

								<div class="col_one_third col_last">
									<label for="template-contactform-service">Services</label>
									<select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
										<option value="">-- Select One --</option>
										<option value="Wordpress">Wordpress</option>
										<option value="PHP / MySQL">PHP / MySQL</option>
										<option value="HTML5 / CSS3">HTML5 / CSS3</option>
										<option value="Graphic Design">Graphic Design</option>
									</select>
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

							<div class="col_one_fourth">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-map-marker2"></i></a>
									</div>
									<h3>Our Headquarters<span class="subtitle">Melbourne, Australia</span></h3>
								</div>
							</div>

							<div class="col_one_fourth">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-phone3"></i></a>
									</div>
									<h3>Speak to Us<span class="subtitle">(123) 456 7890</span></h3>
								</div>
							</div>

							<div class="col_one_fourth">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-skype2"></i></a>
									</div>
									<h3>Make a Video Call<span class="subtitle">CanvasOnSkype</span></h3>
								</div>
							</div>

							<div class="col_one_fourth col_last">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-twitter2"></i></a>
									</div>
									<h3>Follow on Twitter<span class="subtitle">2.3M Followers</span></h3>
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
							<div class="swiper-slide dark" style="background-image: url('{{url('/')}}/assets/frontend/canvas/images/slider/swiper/1.jpg');">
								<div class="container clearfix">
									<div class="slider-caption slider-caption-center">
										<h2 data-animate="fadeInUp">Welcome to Canvas</h2>
										<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on our Canvas.</p>
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