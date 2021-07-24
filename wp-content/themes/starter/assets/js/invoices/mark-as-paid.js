jQuery( function($) {
	$(document).ready( function() {
		
		
		$('[data-invoices]').on( 'click', '[data-invoices-mark-as-paid]', function(e) {
			
			e.preventDefault();
			
			var container = $(e.delegateTarget);
			var button    = $(this);
			
			var checked_items     = container.find('[name="check"]:checked');
			
			
			if ( !checked_items.length ) { return false; }
			
			
			var checked_items_ids = [];
			
			$.each( checked_items, function( key, item ) {
				
				checked_items_ids.push( $(item).val() );
			
			});
			
			
			var domain_name = window.location.hostname;
			var protocol    = window.location.protocol;
			var ajax_url    = protocol + '//' + domain_name + '/wp-admin/admin-ajax.php';
			
			
			var data        = {
				
				action : 'mark_as_paid_invoices',
				ids   : checked_items_ids
			}
			
			$.ajax({
				
				url      : ajax_url,
				type     : 'POST',
				data     : data,
				
				beforeSend: function( xhr ) {
					
					container.addClass('loading');
				},
				
				success: function( data ) {
					
					$.each( checked_items_ids, function( key, value ) {
						
						container.find('[data-invoices-status-item="' + value + '"]').html('<div class="gm_invoices-item__status gm_invoices-item__status--paid">Paid</div>');
						container.find('[name="check-all"]').prop( 'checked', false ).trigger('change');
						
					});
					
					button.blur();
					container.removeClass('loading');
				},
				
				error: function( error ) {
					
					console.log( error );
					
					button.blur(); 
					container.removeClass('loading');
				}
				
			});
			
		});


	});
});
