<?php
/**
 * The Template for displaying all single posts.
 */
get_header(); ?>	
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div><!-- / .colonewide -->
	<div class="coltwothirds leftcol">
		<h1><?php esc_attr(the_title()); ?></h1>
		<p class="date">POSTED: <?php echo get_the_date('j-M-Y'); ?></p>
		<?php if(has_post_thumbnail()) {
			the_post_thumbnail();
		} ?>
		<?php the_content(); ?>
		<p class="cattags">
			<?php if ( count( get_the_category() ) ) : ?>
				CATEGORY: <?php printf( __( '%2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
				<?php endif; ?>
			<br />
			<?php $tags_list = get_the_tag_list( '', ', ' );
				if ( $tags_list ): ?>
				TAG: <?php printf( __( '%2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
				<?php endif; ?></p>
				
		<?php comments_template( '', true ); ?>
		<!-- edit ID based on the page of the blog/news -->
		<a class="backlink" href="<?Php echo get_permalink(1066); ?>">&laquo; Back to Blog</a>
	</div><!-- / .coltwothirds leftcol -->
	<div class="colonethird rightcol">
		<?php get_sidebar(); ?>
	</div><!-- /.colonethird rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>