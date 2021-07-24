jQuery( function($) {
	$(document).ready( function() {
		
		
		$('[data-invoices]').on('change', '[name="check-all"]', function(e){
			
			var container = $(e.delegateTarget);
			
			if ( $(this).is(':checked') ) {
				
				container.find('[name="check"]').prop( 'checked', true );
			}
			
			else {
				
				container.find('[name="check"]').prop( 'checked', false );
			}
			
		});


	});
});
