jQuery( function($) { 
	$(document).ready( function() { 
		
		$(".show-more").click( function() {
			
			if ( $(this).hasClass("active") ) {
				$(this).removeClass("active");
			}
			
			else { 
				$(this).addClass("active");
			}
		});
		
		
		$(".section-with-more-link").each( function() { 
			
			var thisHref = $(this).find("a").attr("href");
			var thisText = $(this).find("a").text();
			
			$(this).find("a").html("<span class='open-label'>" + thisText + "</span><span class='close-label'>" + labels['section-with-more-link'] + "</span>").attr("data-uk-toggle", "{target:'" + thisHref + "'}").removeAttr("href");
		});
		
	});
});