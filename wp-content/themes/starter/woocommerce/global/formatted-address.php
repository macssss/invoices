
<div class="gm_woo-formatted-address">
	<div class="gm_table-list gm_table-list--condensed">
		<div class="gm_table-list__items">
			<div class="gm_table-list__body">
				
				<?php foreach( $args['address'] as $label => $value ): ?>
					
					<?php $label_check = explode( '_', $label ); ?>
					
					<?php if ( $value && $label_check[0] != 'billing' && $label_check[0] != 'shipping' ): ?>
					
						<?php
							
							if ( $label == 'country' ) {
								
								$value = WC()->countries->countries[ $value ];
							}
						
						?>
					
						<div class="gm_table-list__row">
							
							<div class="gm_table-list__cell gm_table-list__cell--label"><?php esc_html_e( $label , 'warp'); ?>:</div>
							<div class="gm_table-list__cell"><?php echo $value; ?></div>
							
						</div>
					
					<?php endif; ?>
					
				<?php endforeach; ?>
				
			</div>
		</div>
	</div>
</div>