<?php
/**
 * Template Name: Sitemap
 */

get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
		} ?>
		<h1><?php esc_attr( the_title() ); ?></h1>
		<?php if ( has_post_thumbnail() ) {
			echo '<span class="featuredimg">';
				the_post_thumbnail();
			echo '</span>';
		} ?>
		<?php the_content(); ?>
		<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
	</div><!-- /.colonewide -->
</div><!-- / .inner -->
<?php get_footer(); ?>
