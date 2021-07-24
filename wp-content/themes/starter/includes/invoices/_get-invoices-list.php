<?php

	function gm_get_invoices_list( $page = 1, $status = '', $from_date = '', $to_date = '', $search = '' ) {
		
		$per_page = 6;
		
		$invoices_return = array();
		
		
		// Get Invoices Params
		
		$args = array(
			
			'post_type'      => 'invoice',
			'posts_per_page' => $per_page,
			'meta_query'     => array( 'relation' => 'AND' ),
		);
		
		
		
		if ( $status && $status != 'all' ) {
		
			$args['meta_query'][] = array(
				
				'key'	  => 'status',
				'value'	  => $status,
				'compare' => 'LIKE',
			);
			
		}
		
		
		
		if ( $from_date || $to_date ) {
			
			if ( $from_date && $to_date ) {
				
				$from_date = DateTime::createFromFormat('d/m/Y', $from_date)->format('Y-m-d');
				$to_date = DateTime::createFromFormat('d/m/Y', $to_date)->format('Y-m-d');
				
				$args['meta_query'][] = array(
					
					'relation' => 'AND',
					
					array(
						
						'key'	  => 'start_date',
						'compare' => '>=',
						'value'	  => $from_date,
						'type'    => 'DATETIME',
					),
					
					array(
						
						'key'	  => 'end_date',
						'compare' => '<=',
						'value'	  => $to_date,
						'type'    => 'DATETIME',
					)
				);
				
			}
			
			elseif ( $from_date ) {
				
				$from_date = DateTime::createFromFormat('d/m/Y', $from_date)->format('Y-m-d');
				
				$args['meta_query'][] = array(
					
					'key'	  => 'start_date',
					'compare' => '>=',
					'value'	  => $from_date,
					'type'    => 'DATETIME',
				);
				
			}
			
			elseif ( $to_date ) {
				
				$to_date = DateTime::createFromFormat('d/m/Y', $to_date)->format('Y-m-d');
				
				$args['meta_query'][] = array(
					
					'key'	  => 'end_date',
					'compare' => '<=',
					'value'	  => $to_date,
					'type'    => 'DATETIME',
				);
				
			}
			
		}
		
		
		
		if ( $search ) {
			
			$restaurants_args = array(
				
				'taxonomy'   => 'restaurant',
				'hide_empty' => false,
				'name__like' => $search
			); 
			
			$restaurants = get_terms( $restaurants_args );
			
			
			$args['tax_query'] = array( 'relation' => 'OR' );
			
			foreach ( $restaurants as $restaurant ) {
				
				$args['tax_query'][] = array(
					
					'taxonomy' => 'restaurant',
					'field'    => 'id',
					'terms'    => $restaurant->term_id
				);
			}
			
		}
		
		// END Get Invoices Params
		
		
		
		// Get All Invoices
		
		$args_all = $args;
		$args_all['posts_per_page'] = -1;
		
		$all_invoices_count = count( get_posts( $args_all ) );
		
		// END Get Invoices
		
		
		
		// Pagination Check
		
		$pagination_count = ceil( $all_invoices_count / $per_page ) ?: 1;
		
		$page = $page > $pagination_count ? $pagination_count : $page;
			
		$args['paged'] = $page;
		
		// END Pagination Check
		
		
		
		// Get Invoices
		
		$invoices_data = get_posts( $args );
		
		// END Get Posts
		
		
		
		// Items
		
		$invoices_list = '';
		
		if ( $invoices_data ) {
			
			foreach ( $invoices_data as $item ) {
				
				ob_start();
				
				get_template_part( 'invoices/item', '', array( 'item' => $item ) );
				$invoices_list .= ob_get_contents();
				
				ob_end_clean();
				
			}
		}
		
		else {
			
			ob_start();
			
			get_template_part( 'invoices/not-found' );
			$invoices_list .= ob_get_contents();
			
			ob_end_clean();
		}
		
		$invoices_return['list'] = $invoices_list;
		
		// END Items
		
		
		
		// Pagination
		
		ob_start();
		
		get_template_part( 'invoices/pagination', '', array( 'count' => $all_invoices_count, 'current' => $page, 'pagination_count' => $pagination_count ) );
		$invoices_return['pagination'] = ob_get_contents();
		
		ob_end_clean();
		
		// END Pagination
		
		
		return $invoices_return;	
	}

?>