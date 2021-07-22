<?php
	
	$item     = $args['item'];
	$id       = $item->ID;
	$currency = 'HK$';
	
	$restaurant       = get_the_terms( $id, 'restaurant' )[0];
	$restaurant_name  = $restaurant->name;
	$restaurant_image = z_taxonomy_image( $restaurant->term_id, 'thumbnail', array( 'alt' => $restaurant_name ), false );
	
	$status_label = get_field( 'status', $id )['label'];
	$status_value = get_field( 'status', $id )['value'];
	
	$start_date = get_field( 'start_date', $id );
	$end_date   = get_field( 'end_date', $id );
	$total      = $currency . get_field( 'total', $id );
	$fees       = $currency . get_field( 'fees', $id );
	$transfer   = $currency . get_field( 'transfer', $id );
	$orders     = get_field( 'orders', $id );
	
?>



<div class="gm_table-list__row">
	
	<div class="gm_table-list__cell gm_table-list__cell--check">
		
		<div class="uk-form-toggler uk-form-toggler-clear">
			<label>
				<input type="checkbox" name="check" value="<?php echo $id; ?>">
				<span></span>
			</label>
		</div>
		
	</div>
	
	<div class="gm_table-list__cell-group gm_table-list__cell-group--global">
		
		<div class="gm_table-list__cell gm_table-list__cell--id" data-title="<?php _e( 'ID', 'warp' ); ?>">
		
			<div class="gm_invoices__id">#<?php echo $id; ?></div>
		
		</div>
		
		
		<div class="gm_table-list__cell gm_table-list__cell--restaurant" data-title="<?php _e( 'Restaurant', 'warp' ); ?>">
			
			<div class="gm_invoices__restaurant">
				
				<div class="gm_invoices__restaurant-media"><?php echo $restaurant_image; ?></div>
				<h3 class="gm_invoices__restaurant-title"><?php echo $restaurant_name; ?></h3>
				
			</div>
			
		</div>
		
		
		<div class="gm_table-list__cell gm_table-list__cell--status" data-title="<?php _e( 'Status', 'warp' ); ?>">
			
			<div class="gm_invoices__status gm_invoices__status--<?php echo $status_value; ?>">
				<?php echo $status_label; ?>
			</div>
			
		</div>
		
		
		<div class="gm_table-list__cell gm_table-list__cell--srart-date" data-title="<?php _e( 'Start Date', 'warp' ); ?>">
			
			<div class="gm_invoices__start-date"><?php echo $start_date; ?></div>
		
		</div>
		
		
		<div class="gm_table-list__cell gm_table-list__cell--end-date" data-title="<?php _e( 'End Date', 'warp' ); ?>">
			
			<div class="gm_invoices__end-date"><?php echo $end_date; ?></div>
			
		</div>
		
		
		<div class="gm_table-list__cell gm_table-list__cell--total" data-title="<?php _e( 'Total', 'warp' ); ?>">
			
			<div class="gm_invoices__end-date"><?php echo $total; ?></div>
			
		</div>
		
		
		<div class="gm_table-list__cell gm_table-list__cell--fees" data-title="<?php _e( 'Fees', 'warp' ); ?>">
			
			<div class="gm_invoices__fees"><?php echo $fees; ?></div>
			
		</div>
		
		
		<div class="gm_table-list__cell gm_table-list__cell--transfer" data-title="<?php _e( 'Transfer', 'warp' ); ?>">
			
			<div class="gm_invoices__transfer"><?php echo $transfer; ?></div>
			
		</div>
		
		
		<div class="gm_table-list__cell gm_table-list__cell--orders" data-title="<?php _e( 'Orders', 'warp' ); ?>">
			
			<div class="gm_invoices__orders"><?php echo $orders; ?></div>
			
		</div>
	
	</div>
	
	
	<div class="gm_table-list__cell gm_table-list__cell--download">
	
		<div class="gm_invoices__download">
			<a href="#download" class="gm_invoices__download-link"></a>
		</div>
	
	</div>
	
</div>