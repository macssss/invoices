jQuery( function($) {       
	$(document).ready( function() {
		
		$(".gm_counter").attr("data-uk-scrollspy", "");
	    
	    $(".gm_counter").on( 'inview.uk.scrollspy', function() { 
		    
		    var counterSpeed = $(this).data("counter-speed");
		    
		    
		    $(this).find(".gm_count").each( function() {
			    
			    var thisNumber = parseInt($(this).text());
			    
			    $(this).animateNumber({ number: thisNumber }, {easing: 'swing', duration: counterSpeed});
		    });
	    });
		
	});
});