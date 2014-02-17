<?php
/* Template Name: Testimonial Listing */
get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		} ?>
	</div><!-- / .colonewide -->
	<div class="coltwothirds leftcol">
		<?php if ( post_type_exists( 'lbd_testimonials' ) ) { ?>
			<h1><?php the_title(); ?></h1>	
			<?php if ( has_post_thumbnail() ) {
				echo '<span class="featuredimg">';
				the_post_thumbnail();
			echo '</span>';
			} ?>
			<?php 
			// the query
			$testimonialsargs = array ( 'post_type' => 'lbd_testimonials', 'order' => 'ASC', 'posts_per_page' => 10 );
			$testimonials_query = new WP_Query( $testimonialsargs );
			if ( $testimonials_query->have_posts() ) : ?>
			<ul class="bloglist">
			  <!-- the loop -->
			  <?php while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>
			  	<li>
					<?php if ( has_post_thumbnail() ) {
						echo '<span class="blogimg">';
						the_post_thumbnail();
						echo '</span><div class="hasimg">';
					} 
					the_excerpt(); 
					echo '<p class="testimonialdetails">';
					// check for custom meta, then display if exisits
					$testimonialname = get_post_meta( $post->ID, "_testimonial_name", true );
					$testimonialrelation = get_post_meta( $post->ID, "_testimonial_relation", true );
					$testimoniallocation = get_post_meta( $post->ID, "_testimonial_location", true );
					// check if the custom fields have a value
					if ( ! empty( $testimonialname ) ) {
					  echo  $testimonialname;
					} 
					if ( ! empty( $testimonialrelation ) ) {
					  echo '<br />' . $testimonialrelation;
					}
					if ( ! empty( $testimoniallocation ) ) {
					  echo '<br />' . $testimoniallocation;
					}
					echo '</p>';
					//if has image close the div that pushes text in line
					if ( has_post_thumbnail() ) {
						echo '</div><!-- / .hasimg -->';
					} ?>
				</li>
				<?php endwhile; ?>

			</ul>
			<?php wp_reset_postdata(); endif; ?>
		<?php } ?>
	</div><!-- / .coltwothirds leftcol -->
	<div class="colonethird rightcol">
		<?php get_sidebar( 'secondary' ); ?>
	</div><!-- /.colonethird rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>
