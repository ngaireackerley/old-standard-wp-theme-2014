<?php
/**
 * The Template for displaying all single events posts.
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
		<?php /* Dislay optional image */
		if ( has_post_thumbnail() ) {
			echo '<span class="blogimgsingle">';
			the_post_thumbnail();
			echo '<span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>';
			echo '</span>';
		}
		if ( function_exists( 'get_field' ) ) {
			if ( get_field( 'start_date_of_event' ) ) {
				$startdate = DateTime::createFromFormat( 'Ymd', get_field( 'start_date_of_event' ));
				echo '<p class="eventdate"><strong>Start Date:</strong> ' . $startdate->format('d/m/Y');
			}
			if ( get_field( 'end_date_of_event' ) ) {
				$enddate = DateTime::createFromFormat( 'Ymd', get_field( 'end_date_of_event' ));
				echo '<br /><strong>End Date:</strong> ' . $enddate->format('d/m/Y');
			}
			if ( get_field( 'start_time' ) ) {
				echo '<br /><strong>Time:</strong> ' . get_field( 'start_time' );
			}
			if ( get_field( 'end_time' ) ) {
				echo ' - ' . get_field( 'end_time' );
			}
			echo '</p><!-- / .eventdate -->';
			if ( get_field( 'event_description' ) ) {
				echo get_field( 'event_description' );
			}	
			/* Address details */
			if ( get_field( 'address_of_event_location' ) ) {
				echo '<br /><p><strong>Location of Event:</strong><br />' . get_field( 'address_of_event_location' ) . '</p>';
			}	
			/* Contact person details */
			if ( get_field( 'contact_persons_name' ) || get_field( 'contact_persons_email' ) || get_field( 'contact_persons_phone_number' )) {
				echo '<br /><p><strong>For more information contact:</strong><br />';
				echo get_field( 'contact_persons_name' );
				echo '<br /><strong>Email:</strong> <a href="mailto:' . get_field( 'contact_persons_email') . '">' . get_field( 'contact_persons_email') . "</a>";
				echo '<br /><strong>Telephone:</strong> ' . get_field( 'contact_persons_phone_number' );
				echo '</p>';
			}	
		}
		?>
		<!-- edit ID based on the page of the staff page -->
		<a class="backlink" href="<?Php echo get_permalink( 1357 ); ?>">&laquo; Back to Event Listing</a>
	</div><!-- / .coltwothirds leftcol -->
	<div class="colonethird rightcol">
		<?php get_sidebar(); ?>
	</div><!-- /.colonethird rightcol -->
</div><!-- / .inner -->
<?php get_footer(); ?>