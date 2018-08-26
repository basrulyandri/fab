/**
 * Style Switcher jQuery functions
 */
;(function($, undefined) {
	'use strict';

	/**
	 * Toggle Switcher
	 */
	var toggle = {
		init: function() {
			$('#switcher .toggle-close').click(function(e) {
				e.preventDefault();

				$('#switcher .switcher-container').hide();
				$(this).hide();
				$('#switcher .toggle-open').show();

				$.cookie('toggle', 'close');
			});

			// Cookie Toggle
			if ($.cookie('toggle') == 'open') {
				$('#switcher .toggle-open').trigger('click');
			}
			else {
				$('#switcher .toggle-close').trigger('click');
			}

			$('#switcher .toggle-open').click(function(e) {
				e.preventDefault();

				$('#switcher .switcher-container').show();
				$(this).hide();
				$('#switcher .toggle-close').show();

				$.cookie('toggle', 'open');
			});
		}
	};

	/**
	 * Layout Switcher
	 */
	var layout = {
		init: function() {
			// Cookie Layout Select
			if ($.cookie('layout') == 'boxed') {
				$('body').removeClass('wide');
				$('body').addClass('boxed');
			}
			else {
				$('body').removeClass('boxed');
				$('body').addClass('wide');
			}

			// Layout Select
			if ($('body').hasClass('boxed')) {
				$('#switcher').find('.layout-select a').removeClass('active');
				$('#switcher').find('.layout-select a').filter('[data-layout="boxed"]').addClass('active');
			}

			$('#switcher .layout-select a').bind('click', function(e) {
				e.preventDefault();

				$('.layout-select a').removeClass('active');
				$(this).addClass('active');

				if ($(this).data('layout') == 'boxed') {
					$('body')
						.removeClass('wide')
						.addClass('boxed');

					$.cookie('layout', 'boxed');
				} else {
					$('body')
						.removeClass('boxed')
						.addClass('wide');

					$.cookie('layout', 'wide');
				}
			});
		}
	};

	/**
	 * Background Switcher
	 */
	var background = {
		init: function() {
			$('.images a').click(function(e) {
				e.preventDefault();

				var current = $('#switcher select[name="layout"]').find('option:selected').val();

				$('body').removeClass('wide').addClass('boxed');
				$('#switcher .layout-select a').trigger('click');

				$('.images').find('img').removeClass('active');
				$(this).find('img').addClass('active');

				var name = $(this).attr('data-name');

				if ($(this).hasClass('background')) {
					$('body')
						.css('background', 'url("images/backgrounds/' + name + '.jpg") no-repeat top center fixed')
						.css('background-size', 'cover');

					$.cookie('background', name);
					$.removeCookie('pattern');
				} else {
					$('body')
						.css('background', 'url("images/patterns/' + name + '.png") repeat top center scroll')
						.css('background-size', 'auto');

					$.cookie('pattern', name);
					$.removeCookie('background');
				}
			});

			$('.images .remove').click(function(e) {
				$('body')
					.css('background-color', '')
					.css('background-image', '')
					.css('background-repeat', '')
					.css('background-position', '')
					.css('background-attachment', '')
					.css('background-size', '')
					.css('background-clip', '')
					.css('background-origin', '');

				$('.images').find('img').removeClass('active');

				$.removeCookie('background');
				$.removeCookie('pattern');
			});

			if ($.cookie('background')) {
				$('body')
					.css('background', 'url("images/backgrounds/' + $.cookie('background') + '.jpg") no-repeat top center fixed')
					.css('background-size', 'cover');

				$('.images').find('a img').removeClass('active');
				$('.images').find('a[data-name="' + $.cookie('background') + '"] img').addClass('active');
			}

			if ($.cookie('pattern')) {
				$('body')
					.css('background', 'url("images/patterns/' + $.cookie('pattern') + '.png") repeat top center scroll')
					.css('background-size', 'auto');

				$('.images').find('img').removeClass('active');
				$('.images').find('a[data-name="' + $.cookie('pattern') + '"] img').addClass('active');
			}
		}
	};

	/**
	 * Style Switcher
	 */
	var style = {
		init: function() {
			$('.styles a').click(function(e) {
				e.preventDefault();

				$('.styles').find('img').removeClass('active');
				$(this).find('img').addClass('active');

				var name = $(this).attr('data-name');

				$('#custom_style').attr('href', 'css/skins/' + name + '.css');
				$('#logo').attr('src', 'images/logos/logo_' + name + '.png');
				$('#logo-footer').attr('src', 'images/logos/logo_footer_' + name + '.png');
				$('#ad-728').attr('src', 'images/banners/728x90_' + name + '.png');

				$.cookie('custom_style', name);
			});

			$('.styles .default').click(function(e) {
				$('.styles').find('img').removeClass('active');
				$('.styles a[data-name="default"]').find('img').addClass('active');

				$('#custom_style').attr('href', 'css/skins/default.css');
				$('#logo').attr('src', 'images/logos/logo_default.png');
				$('#logo-footer').attr('src', 'images/logos/logo_footer_default.png');
				$('#ad-728').attr('src', 'images/banners/728x90_default.png');

				$.removeCookie('custom_style');
			});

			if ($.cookie('custom_style')) {
				$('#custom_style').attr('href', 'css/skins/' + $.cookie('custom_style') + '.css');
				$('#logo').attr('src', 'images/logos/logo_' + $.cookie('custom_style') + '.png');
				$('#logo-footer').attr('src', 'images/logos/logo_footer_' + $.cookie('custom_style') + '.png');
				$('#ad-728').attr('src', 'images/banners/728x90_' + $.cookie('custom_style') + '.png');

				$('.styles').find('img').removeClass('active');
				$('.styles').find('a[data-name="' + $.cookie('custom_style') + '"] img').addClass('active');
			}
		}
	};

	/**
	 * Menu Switcher
	 */
	var menu = {
		init: function() {
			$('.menus a').click(function(e) {
				e.preventDefault();

				$('.menus').find('img').removeClass('active');
				$(this).find('img').addClass('active');

				var name = $(this).attr('data-name');
				var className = $('#nav').attr('class');

				$('#nav').removeClass(className).addClass('navigation l' + name);

				$.cookie('custom_menu', name);
			});

			$('.menus .default').click(function(e) {
				var className = $('#nav').attr('class');

				$('.menus').find('img').removeClass('active');
				$('.menus a[data-name="white"]').find('img').addClass('active');

				$('#nav').removeClass(className).addClass('navigation lwhite');

				$.removeCookie('custom_menu');
			});

			if ($.cookie('custom_menu')) {
				var className = $('#nav').attr('class');

				$('#nav').removeClass(className).addClass('navigation l' + $.cookie('custom_menu'));

				$('.menus').find('img').removeClass('active');
				$('.menus').find('a[data-name="' + $.cookie('custom_menu') + '"] img').addClass('active');
			}
		}
	};

	/**
	 * Headers Switcher
	 */
	var header = {
		init: function() {
			$('.headers a').click(function(e) {
				e.preventDefault();

				$('.headers').find('img').removeClass('active');
				$(this).find('img').addClass('active');

				var name = $(this).attr('data-name');

				$('header')
					.css('background-image', 'url("images/headers/' + name + '.jpg")')
					.css('background-repeat', 'no-repeat')
					.css('background-position', 'top center')
					.css('background-attachment', 'fixed');

				$.cookie('custom_header', name);
			});

			$('.headers .remove').click(function(e) {
				$('header')
					.css('background-image', '')
					.css('background-repeat', '')
					.css('background-position', '')
					.css('background-attachment', '');

				$.removeCookie('custom_header');
			});

			if ($.cookie('custom_header')) {
				$('header')
					.css('background-image', 'url("images/headers/' + $.cookie('custom_header') + '.jpg")')
					.css('background-repeat', 'no-repeat')
					.css('background-position', 'top center')
					.css('background-attachment', 'fixed');

				$('.headers').find('img').removeClass('active');
				$('.headers').find('a[data-name="' + $.cookie('custom_header') + '"] img').addClass('active');
			}
		}
	};

	/**
	 * Font Switcher
	 */
	var font = {
		init: function() {
			$('.fonts select').on('change', function() {
				$('body').css('font-family', $(this).val());

				$.cookie('custom_font', $(this).val());
			});

			if ($.cookie('custom_font')) {
				$('body').css('font-family', $.cookie('custom_font'));
				$('.fonts select').val($.cookie('custom_font'));
			}
		}
	};

	/**
	 * Ready, Load and Resize Functions
	 */
	var onReady = {
		init: function() {
			toggle.init();
			layout.init();
			background.init();
			style.init();
			menu.init();
			header.init();
			font.init();
		}
	};

	var onLoad = {
		init: function() {
		}
	};

	var onResize = {
		init: function() {
		}
	};

	$(document).ready(onReady.init);
	$(window).load(onLoad.init);
	$(window).resize(onResize.init);
})(jQuery);
