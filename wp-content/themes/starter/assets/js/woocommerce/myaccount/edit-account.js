jQuery( function($) {       
	$(document).ready( function() {
		
		$('.gm_woo-edit-account').on( 'change', '.gm_woo-edit-account-password-change-toggler', function(e) {
			
			if ( $(this).is(':checked') ) {
				
				$(e.delegateTarget).find('.gm_woo-edit-account-password-change__fields-wrap').slideDown(150);
				$(window).resize();
			}
			
			else {
				
				$(e.delegateTarget).find('.gm_woo-edit-account-password-change__fields-wrap').slideUp(150);
			}
			
		});
		
	});
});