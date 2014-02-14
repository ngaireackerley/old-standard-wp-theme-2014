<?php
/**
* Plugin Name: Staff
* Description: A simple staff custom post type with meta fields
* Author: Ngaire Ackerley @ LBDesign
* Version: 1.0
* Last Updated: 11.12.2013
*/

/* Set up the post type */
add_action( 'init', 'staff_register_post_type' );

/**
 * Register the 'lbd_staff' post type
 * 
 * @since 1.0
 * 
 * @uses register_post_type()
 */
function staff_register_post_type() {

	/* Set up arguements for the staff post type */
	$staff_args = array(
		'public' => true,
		'query_var' => 'staff',
		'supports' => array(
			'title',
			'thumbnail',
			'excerpt',
			'editor'
		),
		'labels' => array(
			'name' => 'Staff',
			'singular_name' => 'Staff Member',
			'add_new' => 'Add New Staff Member',
			'add_new_item' => 'Add New Staff Member',
			'edit_item' => 'Edit Staff Member',
			'new_item' => 'New Staff Member',
			'view_item' => 'View Staff Member',
			'search_items' => 'Search Staff',
			'not_found' => 'No Staff Members Found',
			'not_found_in_trash' => 'No Staff Members Found In Trash'
		),
	);

	/* Register the staff post type */
	register_post_type( 'staff', $staff_args );

}

/* Add meta boxes */
add_action( 'add_meta_boxes', 'staffboxes_create' );

function staffboxes_create() {
	add_meta_box( 'staff_meta', 'Staff Member Details', 'staff_function', 'staff', 'normal', 'high' );
}

/**
 * Display the content of our custom metabox
 * 
 * @since 1.0
 * 
 * @param WP_Post $post The current WP_Post object
 */
function staff_function( $post ) {

	/* Add in nouce field to check later */
	wp_nonce_field( 'staff_function', 'staff_function_nonce' );

	/* Retrieve the metadata values if they exist */
	$staff_jobtitle = get_post_meta( $post->ID, '_staff_jobtitle', true );
	$staff_location = get_post_meta( $post->ID, '_staff_location', true );
	$staff_tel = get_post_meta( $post->ID, '_staff_tel', true );
	$staff_email = get_post_meta( $post->ID, '_staff_email', true );

	echo 'Please fill out the information below relating to this staff member'; ?>
	<p>Job Title: <input class="widefat" type="text" name="staff_jobtitle" value="<?php echo esc_attr( $staff_jobtitle ); ?>" /></p>
	<p>Location: <input class="widefat" type="text" name="staff_location" value="<?php echo esc_attr( $staff_location ); ?>" /></p>
	<p>Tel: <input class="widefat" type="text" name="staff_tel" value="<?php echo esc_attr( $staff_tel ); ?>" /></p>
	<p>Email: <input class="widefat" type="text" name="staff_email" value="<?php echo esc_attr( $staff_email ); ?>" /></p>

<?php }

/* Hook to save the Meta Box Data */
add_action( 'save_post', 'staffboxes_save_meta' );

function staffboxes_save_meta( $post_id ) {
/**
 * Save the Staff boxes post meta
 * 
 * @since 1.0
 * 
 * @param int $post_id The ID of the post we're saving meta data for
 * @param WP_Post $post The WP_Post object
 * @param bool $update Whether we're updating an existing post
 */

	/* We need to verify this came from the our screen and with proper authorization, because save_post can be triggered at other times. */

	// Check if our nonce is set.
	if ( ! isset( $_POST['staff_function_nonce'] ) )
		return;

	$nonce = $_POST['staff_function_nonce'];

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $nonce, 'staff_function' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;

	// Check the user's permissions.
	if ( 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) )
			return;
		  
	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;
	}
	/* OK, its safe for us to save the data now. */

	// Sanitize user input.
	$data_staff_jobtitle = sanitize_text_field( $_POST['staff_jobtitle'] );
	$data_staff_location = sanitize_text_field( $_POST['staff_location'] );
	$data_staff_tel = sanitize_text_field( $_POST['staff_tel'] );
	$data_staff_email = sanitize_email( $_POST['staff_email'] );

	/* Verify the metadata is set */
	if ( isset( $_POST['staff_jobtitle'] ) ) {
		/* Save the metadata */
		update_post_meta( $post_id, '_staff_jobtitle', strip_tags( $data_staff_jobtitle ) );
		update_post_meta( $post_id, '_staff_location', strip_tags( $data_staff_location ) );
		update_post_meta( $post_id, '_staff_tel', strip_tags( $data_staff_tel ) );
		update_post_meta( $post_id, '_staff_email', strip_tags( $data_staff_email ) );
	}
}
