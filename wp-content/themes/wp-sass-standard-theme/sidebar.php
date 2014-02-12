<?php
/**
 * The Primary Sidebar
 */
?>
<!-- page title -->
<?php
if ( $post->post_parent ) {
	$children	 = wp_list_pages( "title_li=&child_of=" . $post->post_parent . "&echo=0" );
	$titlenamer	 = get_the_title( $post->post_parent );
} else {
	$children	 = wp_list_pages( "title_li=&child_of=" . $post->ID . "&echo=0" );
	$titlenamer	 = get_the_title( $post->ID );
}
if ( $children ) {
	?>

	<p class="subnavtitle"><?php echo $titlenamer; ?></h1>
	<ul class="subnavlinks">
		<?php echo $children; ?>
	</ul><?php } ?>

<?php
if ( is_active_sidebar( 'sidebar-widget-area-one' ) ) :
	echo '<ul class="sidebarone">';
	dynamic_sidebar( 'sidebar-widget-area-one' );
	echo '</ul>';
endif;
?>
