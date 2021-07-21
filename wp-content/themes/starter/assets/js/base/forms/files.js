jQuery( function($) { 
	$(document).ready( function() { 
		
		// Files Input Default
		
		$(".field-file-cont:not(.area) .wpcf7-form-control").wrap("<div class='gm_field-file'></div>");	
		
		$(".gm_field-file").each( function() { 
			
			var field_file = "";
			
			field_file += "<label class='gm_field-file__label uk-button uk-button-small' for='" + $(this).find("input").attr("id") + "'><span>";
				field_file += "<i class='far fa-folder-open'></i> &nbsp; " + labels['select-file'];
			field_file += "</span></label>";
			field_file += "<span class='gm_field-file__clear uk-hidden'><i class='fas fa-times'></i></span>";
			field_file += "<div class='gm_field-file__path'></div>";
			
			$(this).append(field_file);
		});
		
		
		$(".gm_field-file .wpcf7-form-control").change( function() {
			
			var item_value = $(this).val().split("\\");
			item_value = item_value[item_value.length-1];
			
			
			if ( item_value != "" ) { 
				$(this).siblings(".gm_field-file__path").text(item_value).show();
				$(this).siblings(".gm_field-file__clear").removeClass("uk-hidden");
			}
			
			
			else { 
				$(this).siblings(".gm_field-file__path").hide();
				$(this).siblings(".gm_field-file__clear").addClass("uk-hidden");
			}
		});
		
		
		$(".gm_field-file .gm_field-file__clear").click( function() {
			
			$(this).siblings(".wpcf7-form-control").val("").change();
		});
		
		// END File Input Default
		
		
		
		// Files Input Area
		
		var field_file_area = "";
		
		field_file_area += "<div class='gm_field-file-area__icon'><i class='fas fa-file-image'></i></div>";
		field_file_area += "<div class='gm_field-file-area__content'>";
			field_file_area += "<div class='gm_field-file-area__text'>Drag & Drop</div>";
			field_file_area += "<div class='gm_field-file-area__path'>";
				field_file_area += "<span class='gm_field-file-area__path--data'></span>";
				field_file_area += "<span class='gm_field-file-area__path--clear'><i class='fas fa-times'></i></span>";
			field_file_area += "</div>";
		field_file_area += "</div>";
		field_file_area += "<div class='gm_field-file-area__button'><a href='#' class='uk-button uk-button-light'>" + labels['select-file'] + "</a></div>";
		
		$(".field-file-cont.area .wpcf7-form-control").wrap("<div class='gm_field-file-area'><div class='gm_field-file-area__inner'></div></div>");	
		
		$(".gm_field-file-area__inner").append("<div class='gm_field-file-area__label'>" + field_file_area + "</div>");
		
		
		$(".gm_field-file-area .wpcf7-form-control").change( function() {
			
			var item_value = $(this).val().split("\\");
			item_value = item_value[item_value.length-1];
			
			
			if ( item_value != "" ) { 
				$(this).parent().parent().addClass("gm_selected");
				$(this).parent().find(".gm_field-file-area__path--data").text(item_value);
			}
			
			
			else { 
				$(this).parent().parent().removeClass("gm_selected");
			}
			
		});
		
		
		$(".gm_field-file-area__path--clear").click( function() { 
			$(this).parent().parent().parent().siblings(".wpcf7-form-control").val("").change();
		});
		
		
		$(".gm_field-file-area:not(gm_selected)").hover(
			
			function () {
				$(this).find(".gm_field-file-area__button a").addClass("uk-active");
			},
			
			function () {
				$(this).find(".gm_field-file-area__button a").removeClass("uk-active");
			}
		);
		
		// END File Input Area
		
	});
});