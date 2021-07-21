jQuery( function($) {
	$(document).ready( function() { 
		
		if ( $('#copyright').length ) { 
		
			var date = new Date ();
			var year = date.getFullYear ();
			
			var copyright = $('#copyright').html();
			copyright = copyright.replace( '&amp;year', year );
			
			$('#copyright').html( copyright );
		}
		
	});
});