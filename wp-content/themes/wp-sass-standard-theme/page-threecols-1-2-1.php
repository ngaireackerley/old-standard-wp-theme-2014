<?php
/* Template Name: Three Columns 1:2:1 */
get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div><!-- / .colonewide -->
	<div class="colonefourth leftcol">
		<?php get_sidebar(); ?>
	</div><!-- /.colonefourth leftcol -->
	<div class="colonehalfthreecol leftcol rightcol">
		<h1><?php esc_attr(the_title()); ?></h1>
		<?php if(has_post_thumbnail()) {
			the_post_thumbnail();
		} ?>
		<?php the_content(); ?>
	</div><!-- / .colonehalf -->
	<div class="colonefourth rightcol">
		<?php include('sidebar-secondary.php'); ?>
	</div><!-- /.colonefourth rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>
