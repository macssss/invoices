jQuery( function($) {    
	$(document).ready( function() { 
		
		$(window).load(function(){
			
			$("[data-gm-parallax]").each( function() {
				
				var item              = $(this);
				var item_params       = item.data("gm-parallax");
				
				if ( item_params != "{}" && item_params != "" && item_params != undefined ) {
					item_params = JSON.parse( item_params.replace(/'/g, "\"") );
				}
				
				var media             = item.find(".gm_media")[0];
				var media_cont        = ".gm_media-cont";
				var orientation_value = item_params.orientation;
				var scale_value       = item_params.scale;
				
				new simpleParallax( media, {
					
					customWrapper: media_cont,
					orientation: orientation_value,
					scale: scale_value
				});
				
				if ( item.find(".gm_media-mobile") ) {
					
					var media_mobile = item.find(".gm_media-mobile")[0];
					
					new simpleParallax( media_mobile, {
						
						customWrapper: media_cont,
						orientation: orientation_value,
						scale: scale_value
					});
				}
				
			});
		
		});
		
	});
});