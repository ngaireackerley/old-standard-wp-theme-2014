<?php
/* Template Name: FAQ Listing */
get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div><!-- / .colonewide -->
	<div class="coltwothirds leftcol">
		<?php if ( post_type_exists( 'faq' ) ) { ?>
			<h1><?php the_title(); ?></h1>	
			<?php if(has_post_thumbnail()) {
				the_post_thumbnail();
			} ?>
			<?php 
			// the query
			$faqargs = array ( 'post_type' => 'faq', 'order' => 'ASC', 'posts_per_page' => '-1');
			$faq_query = new WP_Query( $faqargs );
			if ( $faq_query->have_posts() ) : ?>
			<ul class="bloglist">
			  <!-- the loop -->
			  <?php while ( $faq_query->have_posts() ) : $faq_query->the_post(); ?>
			  	<li>
					<a href="<?php the_permalink() ?>" class="bloglink"><h2><?php echo the_title(); ?></h2></a>
					<?php the_excerpt(); ?>
				</li>
				<?php endwhile; ?>

			</ul>
			<?php wp_reset_postdata(); endif; ?>
		<?php } ?>
	</div><!-- / .coltwothirds leftcol -->
	<div class="colonethird rightcol">
		<?php include('sidebar-secondary.php'); ?>
	</div><!-- /.colonethird rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>
