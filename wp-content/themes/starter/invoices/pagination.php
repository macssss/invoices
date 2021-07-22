<?php
	
	$count            = (int) $args['count'];
	$per_page         = (int) $args['per_page'];
	$current          = (int) $args['current'];
	$pagination_count = ceil( $count / $per_page );

?>


<div class="gm_invoices__pagination gm_invoices-pagination">
	
	<ul class="gm_invoices-pagination__list">
		
		<?php if ( $pagination_count > 1 && $current > 1 ): ?>
		
			<li><a class="gm_invoices-pagination__item gm_invoices-pagination__item--prev" href="#page-<?php echo $current-1; ?>">Prev</a></li>
		
		<?php endif; ?>
		
		
		<?php 
			
			for ( $i = 1; $i <= $pagination_count; $i++ ) {
				
				$item_class = $i == $current ? ' gm_invoices-pagination__item--active' : '';
				
				echo '<li><a class="gm_invoices-pagination__item' . $item_class . '" href="#page-' . $i . '">' . $i . '</a></li>';
				
			}
		
		?>
		
		
		<?php if ( $pagination_count > 1 && $current < $pagination_count ): ?>
	
			<li><a class="gm_invoices-pagination__item gm_invoices-pagination__item--next" href="#page-<?php echo $current+1; ?>">Next</a></li>
		
		<?php endif; ?>
		
		
	</ul>
	
</div>