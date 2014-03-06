<?php
/* Template Name: Events Listing */
get_header(); ?>
<div class="inner contentpage">
	<div class="colonewide">
		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		} ?>
	</div><!-- / .colonewide -->
	<div class="coltwothirds leftcol">
		<?php if ( post_type_exists( 'lbd_events' ) ) { ?>
			<h1><?php the_title(); ?></h1>	
			<?php if ( has_post_thumbnail() ) {
				echo '<span class="featuredimg">';
				the_post_thumbnail();
			echo '</span>';
			} ?>
			<?php 
			// the query
			$eventargs = array ( 'post_type' => 'lbd_events', 'order' => 'ASC', 'posts_per_page' => -1 );
			$events_query = new WP_Query( $eventargs );
			if ( $events_query->have_posts() ) : ?>
			<ul class="bloglist">
			  <!-- the loop -->
			  <?php while ( $events_query->have_posts() ) : $events_query->the_post(); ?>
			  	<li>
					<a href="<?php the_permalink() ?>" class="bloglink">
					<?php if ( has_post_thumbnail() ) {
						echo '<span class="blogimg">';
						the_post_thumbnail();
						echo '</span>';
					} ?>
					<h2><?php echo the_title(); ?></h2></a>
					<!-- check for custom meta, then display if exisits -->
					<?php if ( function_exists( 'get_field' ) ) {
						echo '<div class="eventdate">';
						if ( get_field( 'start_date_of_event' ) ) {
							$startdate = DateTime::createFromFormat( 'Ymd', get_field( 'start_date_of_event' ));
							echo $startdate->format('d/m/Y');
						}
						if ( get_field( 'end_date_of_event' ) ) {
							$enddate = DateTime::createFromFormat( 'Ymd', get_field( 'end_date_of_event' ));
							echo ' - ' . $enddate->format('d/m/Y');
						}
						echo '</div>';
						if ( get_field( 'short_description' ) ) {
							echo '<p>' . get_field( 'short_description' ) . '</p><br />';
						}
					} ?>	
					<a href="<?php the_permalink() ?>" class="bloglink">Read more about <?php echo the_title(); ?> &raquo;</a> 				
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
