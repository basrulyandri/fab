/**
 * Custom jQuery functions
 */
;(function($, undefined) {
	'use strict';

	/**
	 * Page Functions
	 */
	var page = {
		init: function() {
			var deviceAgent = navigator.userAgent.toLowerCase(),
				agentID = deviceAgent.match(/(iphone|ipod|ipad|android|iemobile)/);

			if (agentID) {
				$('body').addClass('mobile-browser');
			}

			// tinyNav
			if ($.fn.tinyNav) {
				$('#nav .menu').tinyNav({
					header: 'Got to...'
				});
			}

			// Call tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Call Popover
			$('[data-toggle="popover"]').popover({
				trigger: 'hover'
			});

			// Placeholder
			if ($.fn.placeholder) {
				$('input, textarea').placeholder();
			}

			// Autosize
			if ($.fn.autosize) {
				$('textarea').autosize();
			}

			// fitVids
			if ($.fn.fitVids) {
				$('.video').fitVids();
			}

			// Menu Parent
			$('.menu ul .parent > a').append('<i class="icon-angle-right pull-right" style="margin-top:2px;"></i>');

			// Progress Bar Animate
			$('.progress .bar').each(function() {
				var percentage = $(this).attr('data-percentage');

				$(this).css('width', percentage + '%');
			});
		}
	};

	/**
	 * Parallax
	 */
	var parallax = {
		init: function() {
			// .parallax(xPosition, speedFactor, outerHeight) options:
			// xPosition - Horizontal position of the element
			// inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
			// outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
			$('.parallax').parallax('50%', 0.4);
		}
	};

	/**
	 * Fixed Navigation
	 */
	if ($('nav').length > 0) {
		var top = $('nav').offset().top;
	}

	var navigation = {
		init: function() {
			var width = $(window).width();

			if (Modernizr.mq('screen and (min-width: 980px)')) {
				var scroll_top = $(window).scrollTop();

				if (scroll_top > top) {
					$('nav').css({
						'position': 'fixed',
						'top': 0,
						'left': 0
					});

					$('.boxed nav').css({
						'left': (width / 2 - $('.boxed nav').width() / 2) + 'px'
					});
				} else {
					$('nav').css({
						'position': 'relative',
						'left': 0
					});
				}
			}
		}
	};

	/**
	 * jCarousel
	 */
	var jcarousel = {
		init: function() {
			var carousel = $('.jcarousel'),
				jcarouselHideButtons = false;

			carousel.each(function() {
				var jcarouselInstance       = $('#' + $(this).prop('id')),
					jcarouselVertical       = jcarouselInstance.data('vertical'),
					jcarouselRtl            = jcarouselInstance.data('rtl'),
					jcarouselStart          = jcarouselInstance.data('start'),
					jcarouselOffset         = jcarouselInstance.data('offset'),
					jcarouselSize           = jcarouselInstance.data('size'),
					jcarouselScroll         = jcarouselInstance.data('scroll'),
					jcarouselVisible        = jcarouselInstance.data('visible'),
					jcarouselAnimation      = jcarouselInstance.data('animation'),
					jcarouselEasing         = jcarouselInstance.data('easing'),
					jcarouselAuto           = jcarouselInstance.data('auto'),
					jcarouselWrap           = jcarouselInstance.data('wrap'),
					jcarouselHideButtons    = jcarouselInstance.data('hidebuttons'),
					jcarouselButtonPrevHTML = null,
					jcarouselButtonNextHTML = null;

				if (!jcarouselHideButtons) {
					jcarouselButtonPrevHTML = '<div><i class="icon-chevron-left"></i></div>';
					jcarouselButtonNextHTML = '<div><i class="icon-chevron-right"></i></div>';
				}

				if (Modernizr.mq('screen and (max-width: 480px)')) {
					jcarouselScroll = 1;
					jcarouselVisible = 1;
				} else if (Modernizr.mq('screen and (max-width: 767px)')) {
					jcarouselScroll = 2;
					jcarouselVisible = 2;
				} else if (Modernizr.mq('screen and (max-width: 979px)')) {
					jcarouselScroll = 2;
					jcarouselVisible = 2;
				}

				$(this).jcarousel({
					vertical: jcarouselVertical,
					rtl: jcarouselRtl,
					start: jcarouselStart,
					offset: jcarouselOffset,
					size: jcarouselSize,
					scroll: jcarouselScroll,
					visible: jcarouselVisible,
					animation: jcarouselAnimation,
					easing: jcarouselEasing,
					auto: jcarouselAuto,
					wrap: jcarouselWrap,
					buttonPrevHTML: jcarouselButtonPrevHTML,
					buttonNextHTML: jcarouselButtonNextHTML
				});
			});
		}
	};

	/**
	 * Flexslider
	 */
	var flexSlider = {
		init: function() {
			var slider = $('.flexslider');

			slider.each(function() {
				var sliderInstance       = $('#' + $(this).prop('id')),
					sliderSelector       = sliderInstance.data('selector'),
					sliderAnimation      = sliderInstance.data('animation'),
					sliderDirection      = sliderInstance.data('direction'),
					sliderAnimationLoop  = sliderInstance.data('animationloop'),
					sliderControlNav     = sliderInstance.data('controlnav'),
					sliderDirectionNav   = sliderInstance.data('directionnav'),
					sliderSlideshowSpeed = sliderInstance.data('slideshowspeed'),
					sliderAnimationSpeed = sliderInstance.data('animationspeed'),
					sliderPauseOnHover   = sliderInstance.data('pauseonhover'),
					sliderUseCSS         = sliderInstance.data('usecss'),
					sliderItemWidth      = sliderInstance.data('itemwidth'),
					sliderItemMargin     = sliderInstance.data('itemmargin'),
					sliderminItems       = sliderInstance.data('minitems'),
					slidermaxItems       = sliderInstance.data('maxitems');

				$(this).flexslider({
					selector: sliderSelector,
					animation: sliderAnimation,
					direction: sliderDirection,
					animationLoop: sliderAnimationLoop,
					controlNav: sliderControlNav,
					directionNav: sliderDirectionNav,
					slideshowSpeed: sliderSlideshowSpeed,
					animationSpeed: sliderAnimationSpeed,
					pauseOnHover: sliderPauseOnHover,
					useCSS: sliderUseCSS,
					itemWidth: sliderItemWidth,
					itemMargin: sliderItemMargin,
					minItems: sliderminItems,
					maxItems: slidermaxItems,
					prevText: '<i class="icon-chevron-left"></i>',
					nextText: '<i class="icon-chevron-right"></i>'
				});
			});
		}
	};

	/**
	 * Tweet
	 */
	var tweet = {
		init: function() {
			// Ticker Footer
			$('.ticker .tweet').tweet({
				username: 'envato',
				page: 1,
				count: 5,
				template: '<span class="label"><i class="icon-twitter"></i> Twitter</span> {time} {text}'
			}).on('loaded', function() {
				$(this).find('a').prop('target', '_blank');
			});

			// Twitter Widget
			$('.twitter-widget').tweet({
				username: 'envato',
				join_text: 'auto',
				avatar_size: 35,
				count: 3,
				auto_join_text_default: 'we said,',
				auto_join_text_ed: 'we',
				auto_join_text_ing: 'we were',
				auto_join_text_reply: 'we replied to',
				auto_join_text_url: 'we were checking out',
				refresh_interval: 60,
				template: '{avatar}{text}{time}'
			}).on('loaded', function() {
				$(this).find('a').prop('target', '_blank');
			});
		}
	};

	/**
	 * Background full width
	 */
	var newHeight = 0;
	var background = {
		init: function() {
			$('.overall-full').each(function() {
				$.each($(this).children(), function() {
					newHeight += $(this).height();
				});

				$(this).height(newHeight);
				$(this).find('.inner').show();
			});
		}
	};

	/**
	 * Isotope
	 */
	var container = $('#elements');
	var isotope = {
		init: function() {
			container.isotope({
				filter: '*',
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				}
			});

			$('#sortby').on('click', 'a', function(event) {
				event.preventDefault();

				var selector = $(this).data('filter');

				container.isotope({
					filter: selector,
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false

					}
				});
			});
		}
	};

	/**
	 * Twitter and Facebook social counter
	 */
	var t_page = 'envato',
		f_page = 'envato';
	var counter = {
		init: function() {
			// Grab from Twitter
			$.getJSON('http://api.twitter.com/1/users/show.json?screen_name=' + t_page + '&callback=?', function(data) {
				var followers_count = String(data['followers_count']);
				$('#twitter-followers').html(followers_count);
			});

			// Grab from Facebook
			$.getJSON('https://graph.facebook.com/' + f_page + '?callback=?', function(data) {
				var likes = String(data['likes']);
				$('#facebook-likes').html(likes);
			});
		}
	};

	/**
	 * Members Effects
	 */
	var members = {
		init: function() {
			$('.members .span3').hover(
				function() {
					$(this).find('figure').animate({
						'margin-top': '-10px'
					}, 'fast');

					$('.members .span3').stop().fadeTo(200, 0.30);
					$(this).stop().fadeTo(0, 1);
				},

				function() {
					$(this).find('figure').animate({
						'margin-top': '0px'
					}, 'fast');

					$('.members .span3').stop().fadeTo(200, 1);
				}
			);
		}
	};

	/**
	 * Language
	 */
	var language = {
		init: function() {
			$('#language').each(function() {
				$(this).find('.current').on('click', function(event) {
					event.preventDefault();

					$('.language-selector').css({
						visibility: 'visible',
						opacity: 1
					});
				});

				$(this).find('.language-selector .close').on('click', function(event) {
					event.preventDefault();

					$('.language-selector').css({
						visibility: 'hidden',
						opacity: 0
					});
				});
			});
		}
	};

	/**
	 * FAQ
	 */
	var accordionItems = $('#accordion2 .accordion-group');
	var accordion = {
		init: function() {
			$('#accordion-filter').on('click', 'a', function(event) {
				event.preventDefault();

				$('#accordion-filter li').removeClass('active');

				$(this).parent('li').addClass('active');

				var accordionSelector = $(this).data('filter');

				accordionItems.css('display', 'none');

				if (accordionSelector != 'all') {
					$(accordionSelector).fadeIn(500);
				} else {
					accordionItems.fadeIn(500);
				}
			});
		}
	};

	/**
	 * prettyPhoto
	 */
	var prettyPhoto = {
		init: function() {
			$('a[rel^="prettyPhoto"]').prettyPhoto();
		}
	};

	// QR Code.
	var qrcode = {
		init: function() {
			$('#qrcode').qrcode({
				// render: 'table',
				width: 100,
				height: 100,
				text: 'http://themes.atomtech.com.br/citynightlife/html'
			});
		}
	};

	// Contact Map.
	var gmap3 = {
		init: function() {
			$('#map').gmap3({
				map: {
					options: {
						center: [46.578498, 2.457275],
						zoom: 5
					}
				},
				marker: {
					values: [{
						latLng: [48.8620722, 2.352047],
						data: 'Paris !'
					}, {
						address: '86000 Poitiers, France',
						data: 'Poitiers : great city !'
					}, {
						address: '66000 Perpignan, France',
						data: 'Perpignan ! <br> GO USAP !',
						options: {
							icon: 'http://maps.google.com/mapfiles/marker_green.png'
						}
					}],
					options: {
						draggable: false
					},
					events: {
						click: function(marker, event, context) {
							var map = $(this).gmap3('get'),
								infowindow = $(this).gmap3({
									get: {
										name: 'infowindow'
									}
								});
							if (infowindow) {
								infowindow.open(map, marker);
								infowindow.setContent(context.data);
							} else {
								$(this).gmap3({
									infowindow: {
										anchor: marker,
										options: {
											content: context.data
										}
									}
								});
							}
						}
					}
				}
			});
		}
	};

	/**
	 * Menu List
	 */
	var navTabs = {
		init: function() {
			$('.nav-tabs').each(function() {
				var parent = $(this).find('.parent ul'),
					link = $(this).find('.parent > a'),
					active = $(this).find('.active ul');

				parent.hide();
				active.show();

				link.click(function(event) {
					event.preventDefault();

					if (!$(this).parent().hasClass('active')) {
						link.parent().removeClass('active');
						parent.filter(':visible').slideUp('normal');

						$(this).parent().addClass('active');
						$(this).next().stop(true, true).slideDown('normal');
					} else {
						$(this).parent().removeClass('active');
						$(this).next().stop(true, true).slideUp('normal');
					}
				});
			});
		}
	};

	/**
	 * Tabs
	 */
	var tabs = {
		init: function() {
			var width = $(window).width(),
				tabs = $('#tabs');

			if (width < 1200) {
				tabs.addClass('nav-stacked');
			} else {
				tabs.removeClass('nav-stacked');
			}
		}
	};

	/**
	 * Facebook Widget
	 */
	var facebook = {
		init: function() {
			$('#fb-like').each(function() {
				var container_width = $(this).width();

				$(this).html('<div class="fb-like-box" data-href="http://www.facebook.com/envato" data-width="' + container_width + '" data-show-faces="true" data-stream="false" data-header="false"></div>');
				FB.XFBML.parse();
			});
		}
	};

	/**
	 * Advertise
	 */
	var advertise = {
		init: function() {
			$('.ad-728, .ad-336').each(function() {
				$(this).find('.advertising').height($(this).height());
			});
		}
	};

	/**
	 * Center Login Float
	 */
	var login = {
		init: function() {
			$('#login-float').css('margin-top', $(document).height() / 2 - $('#login-float').height() / 2 - 30);
		}
	};

	/**
	 * Footer
	 */
	var width = $(window).width();
	var footer = {
		init: function() {
			$('.footer').each(function() {
				// Logo Footer
				if (width >= 768) {
					var maxHeight = Math.max.apply(null, $(this).find('.row').map(function() {
						return $(this).height();
					}).get());

					var logo_height = $(this).find('.logo').height();

					$(this).find('.logo').css('margin-top', (maxHeight / 2) - (logo_height / 2));
				}
			});
		}
	};

	/**
	 * Scroll Top
	 */
	var scrollTop = {
		init: function() {
			$(window).scroll(function() {
				if ($(this).scrollTop() > 100) {
					$(".scroll-top").fadeIn();
				} else {
					$(".scroll-top").fadeOut();
				}
			});

			$(".scroll-top").click(function() {
				$("html, body").animate({
					scrollTop: 0
				}, 600);
				return false;
			});
		}
	};

	/**
	 * Ready, Load and Resize Functions
	 */
	var onReady = {
		init: function() {
			page.init();
			// navigation.init();
			parallax.init();
			background.init();
			navTabs.init();
			counter.init();
			members.init();
			accordion.init();
			language.init();
			scrollTop.init();

			if ($.fn.qrcode) {
				qrcode.init();
			}

			if ($.fn.tweet) {
				tweet.init();
			}

			if ($.fn.prettyPhoto) {
				prettyPhoto.init();
			}

			if ($.fn.isotope) {
				isotope.init();
			}

			if ($.fn.gmap3) {
				gmap3.init();
			}
		}
	};

	var onLoad = {
		init: function() {
			tabs.init();
			facebook.init();
			advertise.init();
			login.init();
			footer.init();

			if ($.fn.jcarousel) {
				jcarousel.init();
			}

			if ($.fn.flexslider) {
				flexSlider.init();
			}
		}
	};

	var onResize = {
		init: function() {
			// navigation.init();
			tabs.init();
			facebook.init();
			advertise.init();
			login.init();
			footer.init();

			if ($.fn.jcarousel) {
				jcarousel.init();
			}

			if ($.fn.flexslider) {
				flexSlider.init();
			}
		}
	};

	var onScroll = {
		init: function() {
			// navigation.init();
		}
	};

	$(document).ready(onReady.init);
	$(window).load(onLoad.init);
	$(window).resize(onResize.init);
	$(window).scroll(onScroll.init);
})(jQuery);
