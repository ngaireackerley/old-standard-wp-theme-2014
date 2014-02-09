<?php
/* Template Name: Two Columns 1:1 */
get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		} ?>
	</div><!-- / .colonewide -->
	<div class="colonehalf leftcol">
		<h1><?php esc_attr( the_title() ); ?></h1>
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>
		<?php the_content(); ?>
	</div><!-- /.colonehalf leftcol -->
	<div class="colonehalf rightcol">
		<?php get_sidebar( 'secondary' ); ?>
	</div><!-- / .colonehalf rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>
