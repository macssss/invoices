jQuery( function($) { 
	$(document).ready( function() { 
				
		
		// Smooth Scroll
		
		$(".gm_smooth-scroll").attr("data-uk-smooth-scroll", "{offset: " + header_offset + "}");
		
		// END Smooth Scroll
		
		
		
		// One Page
		
		if ( $("body").hasClass("gm_one-page") ) { 
			
			if ( $("body").hasClass("home") ) { 
				
				$(".gm_main-menu").attr("data-uk-scrollspy-nav", "{smoothscroll: {offset: " + header_offset + "}, closest: 'li'}");
				
				$(".uk-nav-offcanvas > li a:not(.external-link)").attr("data-uk-smooth-scroll", "");
				
				$(".gm_main-menu li a.menu-blog-link, .uk-nav-offcanvas > li a.menu-blog-link").attr("href", "#blog");
			}
			
			else { 
				$(".gm_main-menu li a:not(.external-link), .uk-nav-offcanvas > li a:not(.external-link)").each( function() {
					var thisHref = $(this).attr("href");
					$(this).attr("href", "/" + thisHref);
				});
			}
		}
		
		// END One Page
		
		
		
		// Page Hash Smooth
		
		var page_hash = window.location.hash;
		
		if ( page_hash != "" && $(page_hash).length ) { 
			
			$(window).scrollTop(0);
			
			$(window).load( function() {
				
				UIkit.Utils.scrollToElement(UIkit.$(page_hash), { offset : header_offset } );
			});
		}
		
		// END Page Hash Smooth
		
	});
});