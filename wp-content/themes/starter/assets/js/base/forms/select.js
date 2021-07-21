jQuery( function($) { 
	$(document).ready( function() {
		
		$('div[data-select-title]').each( function() {
			
			$(this).find('select option:first-child').text( $(this).data('select-title') );
		});
		
		$('.uk-form select:not(.gm_no-niceselect)').niceSelect();
		
	});
});