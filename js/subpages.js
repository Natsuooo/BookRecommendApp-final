$(function(){
			
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

	$('.toTop').hide();

	$(window).scroll(function () {
	 if ($(this).scrollTop() > 500) {
				$('.toTop').fadeIn();
	 } else {
				$('.toTop').fadeOut();
				}
	 });

	$('.toTop').click(function() {
		$('body, html').animate({ scrollTop: 0 }, 500, 'swing');
		return false;
	});
	
			
});