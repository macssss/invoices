
jQuery( function($) {    
	$(document).ready( function() { 
			
		if ( $(".gm_breadcrumbs").length ) {
			
			
			$(".gm_breadcrumb-mobile__toggler__text").text( $(".gm_breadcrumb-mobile__nav > li.uk-active").text() );
			$(".gm_breadcrumb-mobile__nav > li.uk-active").remove();
			
			
			var breadcrumb_width = $(".gm_breadcrumbs > .uk-container").width() - 1;
			var breadcrumb_items_width = 0;
			
			console.log(breadcrumb_width);
			
			$(".gm_breadcrumbs .uk-breadcrumb > li").each(function(){
				
				breadcrumb_items_width += $(this).width();
			});
			
			
			if ( breadcrumb_items_width > breadcrumb_width ) {
				
				$(".gm_breadcrumbs .uk-breadcrumb").addClass("uk-hidden");
				$(".gm_breadcrumbs .gm_breadcrumb-mobile").removeClass("uk-hidden");
			}
			
			else {
				
				$(".gm_breadcrumbs .uk-breadcrumb").removeClass("uk-hidden");
				$(".gm_breadcrumbs .gm_breadcrumb-mobile").addClass("uk-hidden");
			}
			
			$(".gm_breadcrumbs__inner").removeClass("uk-invisible");
			
			$(window).resize(function(){
				
				breadcrumb_width = $(".gm_breadcrumbs > .uk-container").width() - 1;
				
				if ( breadcrumb_items_width > breadcrumb_width ) {
				
					$(".gm_breadcrumbs .uk-breadcrumb").addClass("uk-hidden");
					$(".gm_breadcrumbs .gm_breadcrumb-mobile").removeClass("uk-hidden");
				}
				
				else {
					
					$(".gm_breadcrumbs .uk-breadcrumb").removeClass("uk-hidden");
					$(".gm_breadcrumbs .gm_breadcrumb-mobile").addClass("uk-hidden");
				}
				
			});
		}
	
	});	
});