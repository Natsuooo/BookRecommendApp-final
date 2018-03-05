$(function() {
	$('.drawer').drawer();
	
	$('.drawer-dropdown-menu').hide();

	$(document).on('click',function () {
		$('.drawer-dropdown-menu').slideUp('swing');
		});
		$('.drawer-dropdown').on('click',function (e) {
		$('.drawer-dropdown-menu').slideToggle('swing');
		e.stopPropagation();
	});
	
	
	$('.footer-category').hide();

	$(document).on('click',function () {
		$('.footer-category').slideUp('swing');
		});
		$('.footer-category-title').on('click',function (e) {
		$('.footer-category').slideToggle('swing');
		e.stopPropagation();
	});
	

	
	$('#dg-container').gallery({
		autoplay	:	true
	});

	$('.cover a[href^="#"]').click(function() {
			var speed = 400; 
			var href= $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top;
			$('body,html').animate({scrollTop:position}, speed, 'swing');
			return false;
		});

	 $('.backToTop').hide();

	 $(window).scroll(function () {
	 if ($(this).scrollTop() > 500) {
				$('.backToTop').fadeIn();
	 } else {
				$('.backToTop').fadeOut();
				}
	 });

	$('.backToTop').click(function() {
		$('body, html').animate({ scrollTop: 0 }, 500, 'swing');
		return false;
	});
			
});