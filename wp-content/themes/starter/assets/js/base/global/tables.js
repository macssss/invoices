jQuery( function($) {       
	$(document).ready( function() {
		
		$(".uk-article table:not(.no-scroll)").each( function() { 
			$(this).wrap("<div class='table-container'><div class='table-container-inner'><div class='table-container-scroll'></div></div></div>");
		});
		
		
		$(".table-container").append("<div class='table-controls'><button class='uk-button uk-button-small uk-button-primary js-btn-table-control scroll-left'><i class='fas fa-chevron-left'></i></button> <button class='uk-button uk-button-small uk-button-primary js-btn-table-control scroll-right'>" + labels['table-scroll'] + " &nbsp;<i class='fas fa-chevron-right'></i></button></div>");
		
		
		function tableOveflowCheck() {
			
			$(".table-container").each( function() {
				
				var thisWidth = $(this).width();
				var thisTableWidth = $(this).find("table").width();
				
				if ( thisWidth < thisTableWidth ) { 
					$(this).addClass("overflowing");
				}
				
				else { 
					$(this).removeClass("overflowing");
				}
			});
		};
		
		
		tableOveflowCheck();
		
			
		$(".js-btn-table-control.scroll-right").click( function() {
			
			var thisTable = $(this).parent().parent().find(".table-container-scroll");
			var leftPos = thisTable.scrollLeft();
			
			thisTable.animate({scrollLeft: leftPos + 150}, 150);
		});
		
		
		
		$(".js-btn-table-control.scroll-left").click( function() {
			
			var thisTable = $(this).parent().parent().find(".table-container-scroll");
			var leftPos = thisTable.scrollLeft();
			thisTable.animate({scrollLeft: leftPos - 150}, 150);
		});
		
		
		
		$(window).resize( function() {
			tableOveflowCheck();
		});
	
	});
});