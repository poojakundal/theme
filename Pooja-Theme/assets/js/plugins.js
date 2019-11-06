jQuery(document).ready(function($){

    /**
     * ScrollUp
    */
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > 1000) {
			jQuery('.scrollup').fadeIn();
		} else {
			jQuery('.scrollup').fadeOut();
		}
	});

	jQuery('.scrollup').click(function() {
		jQuery("html, body").animate({
			scrollTop: 0
		}, 2000);
		return false;
	});

	/**
	 * Nav Toggle
	*/
	$('.nav-toggle').click(function(){
	    $('.nav-toggle').toggleClass('on');
	    $('#primary-menu').slideToggle();
	});
	

});