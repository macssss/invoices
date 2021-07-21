jQuery( function($) {       
	$(document).ready( function() {
		
		$('.gm_table-list').on( 'change', '[data-check-all]', function(e) {
			
			if ( $(this).is(':checked') ) {
				
				$(e.delegateTarget).find('[data-check]').prop( 'checked', true );
			}
			
			else {
				
				$(e.delegateTarget).find('[data-check]').prop( 'checked', false );
			}
			
		});
		
	});
});