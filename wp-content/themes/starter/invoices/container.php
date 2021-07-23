
<div class="gm_invoices uk-form" data-invoices>
	
	<div class="gm_table-list gm_table-list--middle">
		
		
		<div class="gm_table-list__actions gm_invoices-actions">
			<div class="gm_invoices-actions__inner">
				
				
				<div class="gm_invoices-actions__column">
					<div class="gm_invoices-actions__column-inner">
						
						
						<div class="gm_invoices-actions__column-item">
							
							<div class="gm_invoices-status-tabs">
							</div>
							
						</div>
						
						
					</div>
				</div>
				
				
				<div class="gm_invoices-actions__column">
					<div class="gm_invoices-actions__column-inner">
						
						
						<div class="gm_invoices-actions__column-item">
							
							<div class="gm_invoices-date-filter">
								<div class="gm_invoices-date-filter__inner">
									
								</div>
							</div>
							
						</div>
						
						
						<div class="gm_invoices-actions__column-item">
							
							<div class="gm_invoices-search">
								<div class="gm_invoices-search__inner">
									
								</div>
							</div>
							
						</div>
						
						
						<div class="gm_invoices-actions__column-item">
							
							<div class="gm_invoices-mark-as-paid">
								
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
				<?php echo $args['invoices_list']; ?>
			</div>
			
			
			<div class="gm_table-list__footer">
				
				<div class="gm_invoices-pagination-wrap" data-invoices-pagination>
					<?php echo $args['invoices_pagination']; ?>
				</div>
				
			</div>
			
			
		</div>
		
		
	</div>
	
</div>