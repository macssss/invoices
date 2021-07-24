jQuery( function($) {
	$(document).ready( function() {
		
		
		$('[data-invoices]').on( 'change', '[name="check-all"]', function(e) {
			
			var container = $(e.delegateTarget);
			
			if ( $(this).is(':checked') ) {
				
				container.find('[name="check"]').prop( 'checked', true );
			}
			
			else {
				
				container.find('[name="check"]').prop( 'checked', false );
			}
			
		});
		
		
		$('[data-invoices]').on( 'change', '[name="check"]', function(e) {
			
			var container = $(e.delegateTarget);
			
			if ( container.find('[name="check"]:not(:checked)') ) {
				
				container.find('[name="check-all"]').prop( 'checked', false );
			}
			
		});


	});
});
