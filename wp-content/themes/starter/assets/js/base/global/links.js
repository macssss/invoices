jQuery( function($) {    
	$(document).ready( function() { 
		
		$('a.no-link').removeAttr('href');
		
		$('.nofollow-links a, .nofollow-link, #catapult-cookie-bar .ctcc-more-info-link').attr('rel', 'nofollow');
		
	});
});