<?php
/**
 * The secondary sidebar
 */
?>
<?php if ( is_active_sidebar( 'sidebar-widget-area-two' ) ) : 
	echo '<ul class="sidebartwo">';
	dynamic_sidebar( 'sidebar-widget-area-two' ); 
	echo '</ul>';
endif; ?>
