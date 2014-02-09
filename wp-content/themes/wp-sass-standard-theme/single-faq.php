<?php
/**
 * The Template for displaying all single faq posts.
 */
get_header(); ?>	
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
		} ?>
	</div><!-- / .colonewide -->
	<div class="coltwothirds leftcol">
		<h1><?php esc_attr( the_title() ); ?></h1>
		<!-- check for custom meta, then display if exisits -->
		<?php the_content(); ?>
		<!-- edit ID based on the page of the staff page -->
		<a class="backlink" href="<?Php echo get_permalink( 108 ); ?>">&laquo; Back to FAQ</a>
	</div><!-- / .coltwothirds leftcol -->
	<div class="colonethird rightcol">
		<?php get_sidebar(); ?>
	</div><!-- /.colonethird rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>