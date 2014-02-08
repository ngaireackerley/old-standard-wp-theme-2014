<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
		<h1><?php _e( 'Not Found', 'lbd_standard' ); ?></h1>
		<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'lbd_standard' ); ?></p>
		<?php get_search_form(); ?>
		<script type="text/javascript">
			// focus on search field after it has loaded
			document.getElementById('s') && document.getElementById('s').focus();
		</script>
		<p>Or, if you'd like to take a look through our sitemap, the pages in this site are listed below</p>
		<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>

	</div><!-- /.colonewide -->
</div><!-- / .inner -->
<?php get_footer(); ?>