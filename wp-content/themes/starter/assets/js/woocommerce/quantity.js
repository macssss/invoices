jQuery( function($) {       
	$(document).ready( function() {
		
		$(".gm_js_woo-quantity-input").each( function() {
			
			var item_step = parseFloat( $(this).attr("step") );
			
			if ( $(this).attr("step") != 1 ) {
				
				$(this).change( function() {
					
					var item_val = parseFloat( $(this).val() );
					
					if ( !isNaN(item_val) && item_val % item_step != 0 ) {
						
						$(this).val(item_val - (item_val % item_step) + item_step).change();
						
						UIkit.notify( labels['quantity-round'], { status: 'success' } );
					}
					
				});
			}
			
		});
		
	});
});