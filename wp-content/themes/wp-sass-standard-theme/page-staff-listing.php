<?php
/* Template Name: Staff Listing */
get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div><!-- / .colonewide -->
	<div class="coltwothirds leftcol">
		<?php if ( post_type_exists( 'staff' ) ) { ?>
			<h1><?php the_title(); ?></h1>	
			<?php if(has_post_thumbnail()) {
				the_post_thumbnail();
			} ?>
			<?php 
			// the query
			$args = array ( 'post_type' => 'staff', 'order' => 'ASC', 'posts_per_page' => '-1');
			$staff_query = new WP_Query( $args );
			if ( $staff_query->have_posts() ) : ?>
			<ul class="bloglist">
			  <!-- the loop -->
			  <?php while ( $staff_query->have_posts() ) : $staff_query->the_post(); ?>
			  	<li>
					<a href="<?php the_permalink() ?>" class="bloglink">
					<?php if(has_post_thumbnail()) {
						echo '<span class="blogimg">';
						the_post_thumbnail();
						echo '</span><div class="hasimg">';
					} ?>
					<h2><?php echo the_title(); ?></h2></a>
					<!-- check for custom meta, then display if exisits -->
					<?php $jobtitle = get_post_meta( $post->ID, "_staff_jobtitle", true );
					$location = get_post_meta( $post->ID, "_staff_location", true );
					// check if the custom fields have a value
					if( ! empty( $jobtitle ) ) {
					  echo '<p class="jobdetails">' . $jobtitle;
					} 
					if( ! empty( $location ) ) {
					  echo '<br />' . $location . '</p>';
					}
					the_excerpt(); 
					//if has image close the div that pushes text in line
					if(has_post_thumbnail()) {
						echo '</div><!-- / .hasimg -->';
					} ?>
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
