jQuery( function($) {       
	$(document).ready( function() {
		
		$('.user-menu .user-link').siblings('.uk-nav-sub').find('li').removeClass('uk-active');
		$('.user-menu .user-link').siblings('.uk-nav-sub').find('li').each( function() {
			
			if ( $(this).find('> a')[0].pathname == window.location.pathname ) {
				
				$(this).addClass('uk-active');
			}
			
		});
		
		
		$('.user-menu .user-link').parent().attr('data-uk-dropdown', '{pos:"bottom-left"}');
		$('.user-menu .user-link').siblings('.uk-nav-sub').wrap('<div class="uk-dropdown"></div>');
		
		
		
	});
});