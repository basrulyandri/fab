/**
 * Custom jQuery functions
 */
;(function($, undefined) {
	'use strict';

	/**
	 * Effects
	 */
	var effects = {
		init: function() {
			// Upcoming jCarousel
			if ($('html').hasClass('cssanimations')) {
				$('#upcoming-jcarousel .events .date').css('opacity', '0');
			}

			var triggeredAnimateWidgets = false;

			function animateWidgets() {
				if (triggeredAnimateWidgets === false) {
					$('.events .date').addClass('animated fadeInUp');

					$('.events .date').css('opacity', '1');
				}

				triggeredAnimateWidgets = true;
			}

			$('#upcoming-jcarousel .events .date').waypoint({
				handler: function() {
					animateWidgets();
				},
				offset: '100%',
				triggerOnce: true
			});

			// Column Posts
			if ($('html').hasClass('cssanimations')) {
				$('.column-posts .row').css('opacity', '0');
			}

			var triggeredAnimateColumnPosts = false;

			function animateColumnPosts() {
				if (triggeredAnimateColumnPosts === false) {
					$('.column-posts .row').addClass('animated bounceInLeft');

					$('.column-posts .row').css('opacity', '1');
				}

				triggeredAnimateColumnPosts = true;
			}

			$('.column-posts').waypoint({
				handler: function() {
					animateColumnPosts();
				},
				offset: '90%',
				triggerOnce: true
			});

			// Featured News
			if ($('html').hasClass('cssanimations')) {
				$('#featured-news .row').css('opacity', '0');
			}

			var triggeredAnimateFeaturedNews = false;

			function animateFeaturedNews() {
				if (triggeredAnimateFeaturedNews === false) {
					$('#featured-news .row').addClass('animated bounceInLeft');

					$('#featured-news .row').css('opacity', '1');
				}

				triggeredAnimateFeaturedNews = true;
			}

			$('#featured-news').waypoint({
				handler: function() {
					animateFeaturedNews();
				},
				offset: '90%',
				triggerOnce: true
			});

			// Top Videos
			if ($('html').hasClass('cssanimations')) {
				$('#videos .row').css('opacity', '0');
			}

			var triggeredAnimateTopVideos = false;

			function animateTopVideos() {
				if (triggeredAnimateTopVideos === false) {
					$('#videos .row').addClass('animated bounceInLeft');

					$('#videos .row').css('opacity', '1');
				}

				triggeredAnimateTopVideos = true;
			}

			$('#videos').waypoint({
				handler: function() {
					animateTopVideos();
				},
				offset: '90%',
				triggerOnce: true
			});

			// From Gallery
			if ($('html').hasClass('cssanimations')) {
				$('#from-gallery .row').css('opacity', '0');
			}

			var triggeredAnimateFromGallery = false;

			function animateFromGallery() {
				if (triggeredAnimateFromGallery === false) {
					$('#from-gallery .row').addClass('animated bounceInLeft');

					$('#from-gallery .row').css('opacity', '1');
				}

				triggeredAnimateFromGallery = true;
			}

			$('#from-gallery').waypoint({
				handler: function() {
					animateFromGallery();
				},
				offset: '90%',
				triggerOnce: true
			});
		}
	};

	/**
	 * Ready Functions
	 */
	var onReady = {
		init: function() {
			effects.init();
		}
	};

	$(document).ready(onReady.init);
})(jQuery);
