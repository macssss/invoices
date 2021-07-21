jQuery( function($) { 
	$(document).ready( function() {
		
		var format_date = 'DD.MM.YYYY';
		
		
		// Base
		
		$(".date-input").attr("readonly", "readonly");
		
		var date_picker = UIkit.datepicker(
			
			$(".date-input"), {
				
				format: format_date,
				minDate: 0,
				pos: 'bottom',
				
				i18n: {
					months: labels['months-data'],
					weekdays: labels['weekdays-data']
				}
			}
		);
		
		// END Base
		
		
		
		// Linked Dates. !!!Required Moment.js!!!
		
		/*
		$(".date-start, .date-finish").on('change.uk.datepicker', function() {
			var date_start = $(".date-start").val();
			var date_finish = $(".date-finish").val();
			
			var date_start_moment = moment(date_start, format_date);
			var date_finish_moment = moment(date_finish, format_date);
			
			if ( date_start ) { 
				date_finish_picker.options.minDate = date_start_picker.current.format(format_date);
			}
			
			if ( date_start_moment.isAfter(date_finish_moment)) { 
				$(".date-finish").val("");
			}
		});
		*/
		
		// END Linked Dates
		
		
		
		// Advanced Datepicker
		
		$('[data-gm-datepicker]').each( function() {
			
			var item        = $(this);
			var item_params = $(this).attr('data-gm-datepicker');
			
			item.prop('readonly', true);
			
			item.wrap('<div class="uk-form-date"></div>');
			$('<span class="uk-form-date-icon">').insertAfter(item);
			
			
			if ( item_params != null && item_params != '' && item_params != undefined ) {
				
				item_params = JSON.parse( item_params.replace(/'/g, '"') );
			}
			
			var date_picker = UIkit.datepicker(
				
				item, {
					format: format_date,
					minDate: ( item_params.min_date ? item_params.min_date : false ),
					maxDate: ( item_params.max_date ? item_params.max_date : false ),
					pos: 'bottom',
					
					i18n: {
						months: labels['months-data'],
						weekdays: labels['weekdays-data']
					}
				}
			);
			
			item.parent().find('.uk-form-date-icon').on( 'click', function() {
				
				setTimeout( function(){
					
					item.trigger('focus');
					
				}, 0);
				
			});
		});
	
	});
});