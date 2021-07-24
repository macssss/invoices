jQuery( function($) {
	$(document).ready( function() {
		
		
		$('[data-invoices]').on( 'click', 'a[data-invoices-pagination-item]', function(e) {
			
			e.preventDefault();
			
			var container  = $(e.delegateTarget);
			var item_value = parseInt( $(this).data('invoices-pagination-item') );
			
			get_invoices_list( container, item_value, '', '', '', '' );
			
		});
		
		
		
		$('[data-invoices]').on( 'click', '[data-invoices-status-item]', function(e) {
			
			e.preventDefault();
			
			var container  = $(e.delegateTarget);
			var item_value = parseInt( $(this).data('invoices-status-item') );
			
			container.find('[data-invoices-status-item]').removeClass('gm_invoices-status-tabs__item--active').removeClass('gm_js-active');
			$(this).addClass('gm_invoices-status-tabs__item--active').addClass('gm_js-active');
			
			get_invoices_list( container, '', item_value, '', '', '' );
			
		});
		
		
		
		$('[data-invoices] input[name="from_date"]').on( 'changeDate', function() {
			
			var container  = $(this).closest('[data-invoices]');
			var item_value = $(this).val();
			
			get_invoices_list( container, '', '', item_value, '', '' );
				
		});
		
		$('[data-invoices] input[name="to_date"]').on( 'changeDate', function() {
			
			var container  = $(this).closest('[data-invoices]');
			var item_value = $(this).val();
			
			get_invoices_list( container, '', '', '', item_value, '' );
				
		});
		
		
		
		$('[data-invoices]').on( 'keyup', '[name="search"]', function(e) {
			
			var container  = $(e.delegateTarget);
			var item_value = $(this).val();
			
			if ( item_value.length > 3 ) {
				
				get_invoices_list( container, '', '', '', '', item_value );
			}
			
			else if ( !item_value.length ) {
				
				get_invoices_list( container, '', '', '', '', 'empty' );
			}
			
		});
		
		
		
		function get_invoices_list( container, page = 1, status = '', from_date = '', to_date = '', search = '' ) {
			
			var params = get_params( container, page, status, from_date, to_date, search );
			
			var list       = container.find('[data-invoices-list]');
			var pagination = container.find('[data-invoices-pagination]');
			
			
			var data        = {
				
				action : 'get_invoices_list',
				params : params
			}
			
			$.ajax({
				
				url      : ajax_url,
				type     : 'POST',
				dataType : 'JSON',
				data     : data,
				
				beforeSend: function( xhr ) {
					
					container.addClass('loading');
				},
				
				success: function( data ) {
					
					list.html( data.list );
					pagination.html( data.pagination );
					
					var query_string = $.param( params );
					window.history.replaceState( {}, document.title, window.location.pathname + '?' + query_string );
					
					UIkit.Utils.scrollToElement(UIkit.$(container), { duration : 500, offset : 20 } );
					
					container.removeClass('loading');
				},
				
				error: function( error ) {
					
					console.log( error );
					
					UIkit.Utils.scrollToElement(UIkit.$(container), { duration : 500, offset : 20 } );
					
					container.removeClass('loading');
				}
				
			});
			
		}
		
		
		function get_params( container, page = 1, status = '', from_date = '', to_date = '', search = '' ) {
			
			var current_status    = container.find('[data-invoices-status-item].gm_js-active').data('invoices-status-item');
			var current_from_date = container.find('[name="from_date"]').val();
			var current_to_date   = container.find('[name="to_date"]').val();
			var current_search    = container.find('[name="search"]').val().length > 3 ? container.find('[name="search"]').val() : '';
			
			status    = status                            ? status    : current_status;
			from_date = from_date && from_date != 'empty' ? from_date : current_from_date;
			to_date   = to_date && to_date != 'empty'     ? to_date   : current_to_date;
			search    = search && search != 'empty'       ? search    : current_search;
			
			var params = {};
			
			if ( page )      { params.in_page      = page; }
			if ( status )    { params.in_status    = status; }
			if ( from_date ) { params.in_from_date = from_date; }
			if ( to_date )   { params.in_to_date   = to_date; }
			if ( search )    { params.in_search    = search; }
			
			return params;
		}

	});
});
