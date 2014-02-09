<?php
/* Template Name: Two Columns 2:1 */
get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		} ?>
	</div><!-- / .colonewide -->
	<div class="coltwothirds leftcol">
			<h1><?php esc_attr( the_title() ); ?></h1>
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} ?>
			<?php the_content(); ?>
	</div><!-- / .coltwothirds leftcol -->
	<div class="colonethird rightcol">
		<?php get_sidebar( 'secondary' ); ?>
	</div><!-- /.colonethird rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>
