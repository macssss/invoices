jQuery( function($) { 
	$(document).ready( function() { 
		
		// Dropdown Center
	    
	    $("body.gm_dropdown-center .tm-navbar .uk-dropdown").addClass('uk-dropdown-center');
	    
	    // END Dropdown Center
	    
	    
	    
	    // Navbar submbenu
		
		$(".uk-dropdown .uk-nav li").each( function() {
			
			$(this).hover( 
				
				function() { 
					$(this).find("> .uk-nav-sub").slideDown(150);
				},
				
				function() { 
					$(this).find("> .uk-nav-sub").slideUp(150);
				}
			);
		});
		
		// END Navbar submenu
		
		
		
		// Offcanvas Submenu
		
		$(".uk-nav-side > li.uk-parent, .uk-nav-offcanvas > li.uk-parent").append("<span class='toggler'></span>");
		
		$(".uk-nav-side .toggler, .uk-nav-offcanvas .toggler").click( function() {
		
			if ( $(this).hasClass("active") ) { 
				$(this).parent().find("> .uk-nav-sub").slideUp(150);
				$(this).removeClass("active");
			}
			
			else { 
				$(this).parent().find("> .uk-nav-sub").slideDown(150);
				$(this).addClass("active");
			}
		});
		
		
		$(".uk-nav-side a.no-link, .uk-nav-offcanvas a.no-link").click( function() {
			$(this).parent().find("> .toggler").click();
		});
		
		
		$(".uk-nav-side a.no-link, .uk-nav-offcanvas a.no-link").hover(
			
			function() {
				$(this).parent().find("> .toggler").addClass("hover");
			},
		
		
			function() { 
				$(this).parent().find("> .toggler").removeClass("hover");
			}
		);
		
		// END Offcanvas Submenu
		
	});
});