<?php
	
	$count            = (int) $args['count'];
	$per_page         = (int) $args['per_page'];
	$current          = (int) $args['current'];
	$pagination_count = ceil( $count / $per_page );

?>


<div class="gm_invoices-pagination">
	
	<div class="gm_invoices-pagination__inner">
		
		
		<div class="gm_invoices-pagination__current-wrap">
			
			<div class="gm_invoices-pagination__current"><?php printf( '%s %s %s %s', __( 'Page', 'wrap' ) , $current, __( 'of', 'wrap' ), $pagination_count ); ?></div>
			
		</div>
		
		
	
		<div class="gm_invoices-pagination__list-wrap">
			
			<ul class="gm_invoices-pagination__list">
				
				<?php if ( $pagination_count > 1 && $current > 1 ): ?>
				
					<li><a class="gm_invoices-pagination__item gm_invoices-pagination__item--prev" href="#page-<?php echo $current - 1; ?>"></a></li>
				
				<?php endif; ?>
				
				
				<?php 
					
					for ( $i = 1; $i <= $pagination_count; $i++ ) {
						
						if ( $i == $current ) {
							
							echo '<li><span class="gm_invoices-pagination__item gm_invoices-pagination__item--active">' . $i . '</a></li>';
						}
						
						else {
							
							echo '<li><a class="gm_invoices-pagination__item" href="#page-' . $i . '">' . $i . '</a></li>';
						}
						
					}
				
				?>
				
				
				<?php if ( $pagination_count > 1 && $current < $pagination_count ): ?>
			
					<li><a class="gm_invoices-pagination__item gm_invoices-pagination__item--next" href="#page-<?php echo $current + 1; ?>"></a></li>
				
				<?php endif; ?>
				
				
			</ul>
			
		</div>
		
	
	</div>
	
</div>