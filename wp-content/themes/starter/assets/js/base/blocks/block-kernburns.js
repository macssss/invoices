jQuery( function($) {       
	$(document).ready( function() {
	    
	    $("body.gm_title-section-kernburns .gm_block-title-section:not(.gm_block-kernburns)").addClass("gm_block-kernburns");
	    
	    $(".gm_block-kernburns.gm_filled").each(function(){
		   
		   var title_section_back = $(this).css("backgroundImage");
		    
		    if ( title_section_back != "none" ) { 
			    
			    var title_section_animations = ["uk-animation-top-left", "uk-animation-top-center", "uk-animation-top-right", "uk-animation-middle-left", "uk-animation-middle-right", "uk-animation-bottom-left", "uk-animation-bottom-center", "uk-animation-bottom-right"];
			    
			    var title_section_current_animation = title_section_animations[Math.floor(Math.random() * title_section_animations.length)];
			    
			    $(this).prepend("<div class='gm_block-kernburns__inner uk-cover-background uk-position-cover uk-animation-scale uk-animation-reverse " + title_section_current_animation + "' style='background-image: "+ title_section_back +"; animation-duration: 15s;'></div>");
			    
		    }
		    
	    });
	
	});
});