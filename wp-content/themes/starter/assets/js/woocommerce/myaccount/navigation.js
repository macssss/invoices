jQuery( function($) {       
	$(document).ready( function() {
		
		$('.gm_woo-myaccount-navigation__title').click( function() {
			
			if ( window_size <= 850 ) {
			
				if ( $(this).hasClass('active') ) { 
					
					$(this).siblings('.gm_woo-myaccount-navigation__inner').slideUp(150);
					$(this).removeClass('active');
				}
				
				else {
					
					$(this).siblings('.gm_woo-myaccount-navigation__inner').slideDown(150);
					$(this).addClass('active');
				}
				
			}
			
		});
		
	});
});