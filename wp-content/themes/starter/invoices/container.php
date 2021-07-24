<?php
	
	$invoices_list       = isset( $args['invoices_list'] )       ? $args['invoices_list']       : '';
	$invoices_pagination = isset( $args['invoices_pagination'] ) ? $args['invoices_pagination'] : '';
	$status              = isset( $args['status'] )              ? $args['status']              : '';
	$from_date           = isset( $args['from_date'] )           ? $args['from_date']           : '';
	$to_date             = isset( $args['to_date'] )             ? $args['to_date']             : '';
	$search              = isset( $args['search'] )              ? $args['search']              : '';
	$statuses            = isset( $args['statuses'] )            ? $args['statuses']            : array();
	
?>

<div class="gm_invoices uk-form" data-invoices>
	
	<div class="gm_table-list gm_table-list--middle">
		
		
		<div class="gm_table-list__actions gm_invoices-actions">
			<div class="gm_invoices-actions__inner">
				
				
				<div class="gm_invoices-actions__column">
					<div class="gm_invoices-actions__column-inner">
						
						
						<?php if ( $statuses ): ?>
						
							<div class="gm_invoices-actions__column-item">
								
								<div class="gm_invoices-status-tabs" data-invoices-status>
									
									<ul class="gm_invoices-status-tabs__list">
										
										<?php
											
											foreach( $statuses as $key => $status_item ) {
												
												$value = $status_item['value'];
												$label = $status_item['label'];
												$class = ( !$status && $key == 0 ) || ( $status == $status_item['value'] ) ? ' gm_invoices-status-tabs__item--active gm_js-active' : '';
												
												printf( '<li><a href="#%s" class="gm_invoices-status-tabs__item%s" data-invoices-status-item="%s">%s</a></li>', $value, $class, $value, $label );
											}	
										?>
										
									</ul>
									
								</div>
								
							</div>
							
						<?php endif; ?>
						
						
					</div>
				</div>
				
				
				<div class="gm_invoices-actions__column">
					<div class="gm_invoices-actions__column-inner">
						
						
						<div class="gm_invoices-actions__column-item">
							
							<div class="gm_invoices-date-filter">
									
								<div class="gm_invoices-date-filter__field-wrap">
									<input type="text" name="from_date" class="gm_invoices-date-filter__field uk-form-small" value="<?php echo $from_date; ?>" placeholder="<?php _e( 'From', 'warp' ); ?>" />
								</div>
								
								<div class="gm_invoices-date-filter__arrow"></div>
								
								<div class="gm_invoices-date-filter__field-wrap">
									<input type="text" name="to_date" class="gm_invoices-date-filter__field uk-form-small" value="<?php echo $to_date; ?>" placeholder="<?php _e( 'To', 'warp' ); ?>" />
								</div>
									
							</div>
							
						</div>
						
						
						<div class="gm_invoices-actions__column-item">
							
							<div class="gm_invoices-search">
								<input type="search" name="search" class="gm_invoices-search__field uk-form-small" value="<?php echo $search; ?>" placeholder="<?php _e( 'Search', 'warp' ); ?>" />
							</div>
							
						</div>
						
						
						<div class="gm_invoices-actions__column-item">
							
							<div class="gm_invoices-mark-as-paid">
								<a href="#mark-as-paid" class="uk-button uk-button-small uk-button-primary" data-invoices-mark-as-paid><?php _e( 'Mark as paid', 'warp' ); ?></a>
							</div>
							
						</div>
						
						
					</div>
				</div>
				
				
			</div>
		</div>
		
		
		
		<div class="gm_table-list__items">
			
			<div class="gm_table-list__head">
				<div class="gm_table-list__row">
					
					<div class="gm_table-list__cell gm_table-list__cell--check">
						
						<div class="uk-form-toggler uk-form-toggler-clear">
							<label>
								<input type="checkbox" name="check-all">
								<span></span>
							</label>
						</div>
						
					</div>
					
					<div class="gm_table-list__cell-group gm_table-list__cell-group--global">
						
						<div class="gm_table-list__cell gm_table-list__cell--label gm_table-list__cell--id">
							<?php _e( 'ID', 'warp' ); ?>
						</div>
						
						<div class="gm_table-list__cell gm_table-list__cell--restaurant">
							<?php _e( 'Restaurant', 'warp' ); ?>
						</div>
						
						<div class="gm_table-list__cell gm_table-list__cell--status">
							<?php _e( 'Status', 'warp' ); ?>
						</div>
						
						<div class="gm_table-list__cell gm_table-list__cell--srart-date">
							<?php _e( 'Start Date', 'warp' ); ?>
						</div>
						
						<div class="gm_table-list__cell gm_table-list__cell--end-date">
							<?php _e( 'End Date', 'warp' ); ?>
						</div>
						
						<div class="gm_table-list__cell gm_table-list__cell--total">
							<?php _e( 'Total', 'warp' ); ?>
						</div>
						
						<div class="gm_table-list__cell gm_table-list__cell--fees">
							<?php _e( 'Fees', 'warp' ); ?>
						</div>
						
						<div class="gm_table-list__cell gm_table-list__cell--transfer">
							<?php _e( 'Transfer', 'warp' ); ?>
						</div>
						
						<div class="gm_table-list__cell gm_table-list__cell--orders">
							<?php _e( 'Orders', 'warp' ); ?>
						</div>
					
					</div>
					
					<div class="gm_table-list__cell gm_table-list__cell--download"></div>
					
				</div>
			</div>
			
			
			<div class="gm_table-list__body" data-invoices-list>
				<?php echo $invoices_list; ?>
			</div>
			
			
			<div class="gm_table-list__footer">
				
				<div class="gm_invoices-pagination-wrap" data-invoices-pagination>
					<?php echo $invoices_pagination; ?>
				</div>
				
			</div>
			
			
		</div>
		
		
	</div>
	
	<?php wp_nonce_field( 'gm_invoices_nonce', 'gm_invoices_nonce' ); ?>
	
</div>