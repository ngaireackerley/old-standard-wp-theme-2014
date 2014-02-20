<?php
/**
* Plugin Name: LBDesign Events
* Description: A simple events custom post type without meta fields, Advanced custom fields are required
* Author: Ngaire Ackerley @ LBDesign
* Version: 1.0
* Last Updated: 20.02.2014
*/

/* Set up the post type */
add_action( 'init', 'lbdesign_events_register_post_type' );

/* Register post types */
function lbdesign_events_register_post_type() {

	/* Set up arguements for the events post type */
	$faq_args = array(
		'public' => true,
		'query_var' => 'events',
		'supports' => array(
			'title',
			'excerpt',
			'thumbnail'
		),
	    'rewrite' => array( 'slug' => 'events' ),
		'labels' => array(
			'name' => 'Events',
			'singular_name' => 'Event',
			'add_new' => 'Add New Event',
			'add_new_item' => 'Add New Event',
			'edit_item' => 'Edit Event',
			'new_item' => 'New Event',
			'view_item' => 'View Event',
			'search_items' => 'Search Events',
			'not_found' => 'No Events Found',
			'not_found_in_trash' => 'No Events Found In Trash'
		),
	);

	/* Register the events post type */
	register_post_type( 'lbd_events', $faq_args );

}
