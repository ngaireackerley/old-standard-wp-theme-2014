<?php
/**
* Plugin Name: LBDesign Testimonials
* Description: A simple testimonials custom post type with meta fields
* Author: Ngaire Ackerley @ LBDesign
* Version: 1.0
* Last Updated: 17.02.2014
*/

/* Set up the post type */
add_action( 'init', 'testimonial_register_post_type' );

/**
 * Register the 'lbd_testimonials' post type
 * 
 * @since 1.0
 * 
 * @uses register_post_type()
 */
function testimonial_register_post_type() {

	/* Set up arguements for the testimonial post type */
	$testimonial_args = array(
		'public' => true,
		'query_var' => 'testimonials',
		'supports' => array(
			'title',
			'thumbnail',
			'excerpt',
			'editor'
		),
	    'rewrite' => array( 'slug' => 'testimonials' ),
		'labels' => array(
			'name' => 'Testimonials',
			'singular_name' => 'Testimonial',
			'add_new' => 'Add New Testimonial',
			'add_new_item' => 'Add New Testimonial',
			'edit_item' => 'Edit Testimonial',
			'new_item' => 'New Testimonial',
			'view_item' => 'View Testimonial',
			'search_items' => 'Search Testimonials',
			'not_found' => 'No Testimonials Found',
			'not_found_in_trash' => 'No Testimonials Found In Trash'
		),
	);

	/* Register the testimonial post type */
	register_post_type( 'lbd_testimonials', $testimonial_args );

}

/* Add meta boxes */
add_action( 'add_meta_boxes', 'testimonialboxes_create' );

/**
 * Add our custom metabox to the Testimonial post type
 * 
 * @since 1.0
 * 
 * @uses add_meta_box()
 */
function testimonialboxes_create() {
	add_meta_box( 'testimonial_meta', 'Testimonial Details', 'testimonial_function', 'lbd_testimonials', 'normal', 'high' );
}

/**
 * Display the content of our custom metabox
 * 
 * @since 1.0
 * 
 * @param WP_Post $post The current WP_Post object
 */
function testimonial_function( $post ) {

	/* Add in nouce field to check later */
	wp_nonce_field( 'testimonial_function', 'testimonial_function_nonce' );

	/* Retrieve the metadata values if they exist */
	$testimonial_name = get_post_meta( $post->ID, '_testimonial_name', true );
	$testimonial_relation = get_post_meta( $post->ID, '_testimonial_relation', true );
	$testimonial_location = get_post_meta( $post->ID, '_testimonial_location', true );

	echo 'Please fill out the information below relating to this testimonial member';
	?>
	<p>Name: <input class="widefat" type="text" name="testimonial_name" value="<?php echo esc_attr( $testimonial_name ); ?>" /></p>
	<p>Relation (This may be an employment location, job title, place you went to etc.): <input class="widefat" type="text" name="testimonial_relation" value="<?php echo esc_attr( $testimonial_relation ); ?>" /></p>
	<p>Location: <input class="widefat" type="text" name="testimonial_location" value="<?php echo esc_attr( $testimonial_location ); ?>" /></p>
	<?php
}

/* Hook to save the Meta Box Data */
add_action( 'save_post_lbd_testimonials', 'testimonialboxes_save_meta' );

/**
 * Save the Testimonial boxes post meta
 * 
 * @since 1.0
 * 
 * @see wp_insert_post()
 * 
 * @param int $post_id The ID of the post we're saving meta data for
 * @param WP_Post $post The WP_Post object
 * @param bool $update Whether we're updating an existing post
 */
function testimonialboxes_save_meta( $post_id, $post, $update ) {

	/* We need to verify this came from the our screen and with proper authorization, because save_post can be triggered at other times. */

	// Check if our nonce is set.
	if ( ! isset( $_POST['testimonial_function_nonce'] ) )
		return;

	$nonce = $_POST['testimonial_function_nonce'];

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $nonce, 'testimonial_function' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) )
		return;
	
	/* OK, its safe for us to save the data now. */

	// Sanitize user input.
	$data_testimonial_name = sanitize_text_field( $_POST['testimonial_name'] );
	$data_testimonial_relation = sanitize_text_field( $_POST['testimonial_relation'] );
	$data_testimonial_location = sanitize_text_field( $_POST['testimonial_location'] );

	/* Verify the metadata is set */
	if ( isset( $_POST['testimonial_name'] ) ) {
		/* Save the metadata */
		update_post_meta( $post_id, '_testimonial_name', $data_testimonial_name );
		update_post_meta( $post_id, '_testimonial_relation', $data_testimonial_relation );
		update_post_meta( $post_id, '_testimonial_location', $data_testimonial_location );
	}
}
