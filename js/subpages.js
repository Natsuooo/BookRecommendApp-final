$(function(){
			
	$('.drawer').drawer();
	
	$('.dropdown-category-menu').hide();

	$(document).on('click',function () {
		$('.dropdown-category-menu').slideUp('swing');
		});
		$('.dropdown-category').on('click',function (e) {
		$('.dropdown-category-menu').slideToggle('swing');
		e.stopPropagation();
	});
	
	
	$('.dropdown-mypage-menu').hide();

	$(document).on('click',function () {
		$('.dropdown-mypage-menu').slideUp('swing');
		});
		$('.dropdown-mypage').on('click',function (e) {
		$('.dropdown-mypage-menu').slideToggle('swing');
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