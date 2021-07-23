jQuery( function($) {
	$(document).ready( function() {
		
		
		$('.gm_invoices-date-filter').each( function() {
			
			var start_date = $(this).find('input[name="start_date"]');
			var end_date   = $(this).find('input[name="end_date"]');
			
			var datepicker = new DateRangePicker( $(this)[0], {
				
				format    : 'dd/mm/yyyy',
				weekStart : 1,
				inputs    : [ start_date[0], end_date[0] ]
				
			}); 
			
		});
		
		

	});
});
