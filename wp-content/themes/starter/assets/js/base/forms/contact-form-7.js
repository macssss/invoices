jQuery( function($) { 
	$(document).ready( function() { 
		
		document.addEventListener('wpcf7invalid', function (event) {
			
			$(".wpcf7-form-control").each(function () {
				
				if ( $(this).hasClass("wpcf7-not-valid") ) {
					$(this).addClass("uk-form-danger");
					
					if ( $(this).hasClass("wpcf7-file") ) {
						$(this).siblings(".uk-button").addClass("uk-button-danger");
					}
				}
				
				else {
					$(this).removeClass("uk-form-danger");
				}
				
			});
			
		}, false);
		
		
		
		document.addEventListener( 'wpcf7mailsent', function( event ) {
			
			setTimeout(function(){
				$(".uk-form select").niceSelect('update');
				$(".field-file-cont .clear-file").click();
			}, 1);
			
		}, false );
		
		
		$(".wpcf7-submit").each( function() { 
			
			$(this).after("<button type='submit' class='"+$(this).attr("class")+"'><span>"+$(this).val()+"</span></button>");
			$(this).remove();
		});
		
	});
});