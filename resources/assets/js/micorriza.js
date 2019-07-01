import {ifElementExistsThenLaunch} from './functions/dom';
import {w} from './cltvo/constants.js';
// import {alertsController} from './alerts-controller';

w.on('load', () => {
	ifElementExistsThenLaunch([
		// ['#alert__container', alertsController, 'init', []],
	]);
});

//Alerts: Display & Hide
jQuery(document).ready( function($) {
	$('#alert__container').css('top','0');
	$('#alert__container').click(function () {
		$('#alert__success').fadeOut();
		$('#alert__danger').fadeOut();
	});
});

// Page Transitions
(function($) {
	$(window).load(function() {
		$('#pre_JS').fadeOut(500);
	});
})(jQuery);

//Mobile Menu
jQuery(document).ready(function($){
	$('.mobile_JS').slideUp(0);
	var toggle = 0;
	$('.mobile_btn_JS').click( function () {
		if ( toggle === 0 ) {
			$('.mobile_JS').slideDown('fast');
			toggle++;
		} else {
			$('.mobile_JS').slideUp('fast');
			toggle = 0;
		}
	});
	$(window).resize( function () {
		$('.mobile_JS').slideUp('fast');
		toggle = 0;
	});
});

// Gallery Slider
jQuery(document).ready(function($){
	$('.gallery_slider_JS').slick({
		dots: false,
		speed: 300,
		infinite: true,
		prevArrow: '.gallery_prev_JS',
		nextArrow: '.gallery_next_JS',
	})
	$('.gallery_close_JS').on('click',function () {
		$('.gallery_fade_JS').fadeOut()
	})
	$('.gallery_item_JS').on('click',function () {
		var slideIndex = $(this).index()
		$('.gallery_slider_JS').slick('slickGoTo',parseInt(slideIndex))
		$('.gallery_fade_JS').fadeIn()
	})

	$('.slider_JS').slick({
		dots: false,
		speed: 300,
		infinite: true,
		fade: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		autoplay: true
	})
})

//Current Menu Item
jQuery(document).ready(function($) {
	$('.a_JS').each( function () {
		var id = $(this).attr('id')
		if(window.location.href.indexOf(id) > -1) {
			$(this).addClass('current')
		}
	})
})

//Smooth Scroll
$(function() {
	$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top - 20
				}, 650, 'easeOutExpo');
				return false;
			}
		}
	});
});

//Header Scroll
 $(window).scroll(function() {
	if ($(window).scrollTop() > 0) {
		$('.header_JS').removeClass('open')
		$('.header_logo_JS').css('background-color','#ffffff')
	}
 })

 //Autosize Textareas
 autosize($('textarea'))
