jQuery( function($) {
	$(document).ready( function() {
		
		
		$('.gm_invoices-date-filter').each( function() {
			
			var start_date = $(this).find('input[name="from_date"]');
			var end_date   = $(this).find('input[name="to_date"]');
			
			var datepicker = new DateRangePicker( $(this)[0], {
				
				format             : 'dd/mm/yyyy',
				weekStart          : 1,
				allowOneSidedRange : true,
				inputs             : [ start_date[0], end_date[0] ]
				
			});
			
		});


	});
});
