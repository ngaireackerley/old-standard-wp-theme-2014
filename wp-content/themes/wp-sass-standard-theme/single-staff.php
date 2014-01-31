<?php
/**
 * The Template for displaying all single staff posts.
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
		<!-- check for custom meta, then display if exisits -->
		<?php $jobtitle = get_post_meta( $post->ID, "_staff_jobtitle", true );
		$location = get_post_meta( $post->ID, "_staff_location", true );
		$email = get_post_meta( $post->ID, "_staff_email", true );
		$telephone = get_post_meta( $post->ID, "_staff_tel", true );
		// check if the custom fields have a value
		if(! empty( $jobtitle) || ($location)) {
			echo '<p class="jobdetails">';
			if( ! empty( $jobtitle ) ) {
			  echo  $jobtitle;
			} 
			if(! empty( $jobtitle) && ($location)) {
					echo '<br />';
				}
			if( ! empty( $location ) ) {
			  echo $location;
			} 
			echo '</p>';
		}
		if(! empty( $email) || ($telephone)) {
			echo '<p class="jobdetails">';
			if( ! empty( $email ) ) {
			  echo 'Email: <a href="mailto:' . $email . '">' . $email . '</a>';
			} 
			if(! empty( $email) && ($telephone)) {
				echo '<br />';
			}
			if( ! empty( $telephone ) ) {
			  echo 'Phone: ' . $telephone;
			} 
			echo '</p>';
		}
		/* Display Content */
		if(has_post_thumbnail()) {
			echo '<span class="blogimgsingle">';
			the_post_thumbnail();
			echo '<span class="caption">' . get_post(get_post_thumbnail_id())->post_excerpt . '</span>';
			echo '</span>';
		}
		the_content(); ?>
		<!-- edit ID based on the page of the staff page -->
		<a class="backlink" href="<?Php echo get_permalink(93); ?>">&laquo; Back to Staff Listing</a>
	</div><!-- / .coltwothirds leftcol -->
	<div class="colonethird rightcol">
		<?php get_sidebar(); ?>
	</div><!-- /.colonethird rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>