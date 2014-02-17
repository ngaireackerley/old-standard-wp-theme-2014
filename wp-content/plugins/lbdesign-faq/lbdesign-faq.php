<?php
/**
* Plugin Name: LBDesign FAQ
* Description: A simple faq custom post type without meta fields
* Author: Ngaire Ackerley @ LBDesign
* Version: 1.0
* Last Updated: 18.12.2013
*/

/* Set up the post type */
add_action( 'init', 'lbdesign_faq_register_post_type' );

/* Register post types */
function lbdesign_faq_register_post_type() {

	/* Set up arguements for the faq post type */
	$faq_args = array(
		'public' => true,
		'query_var' => 'faq',
		'supports' => array(
			'title',
			'excerpt',
			'editor'
		),
		'labels' => array(
			'name' => 'FAQs',
			'singular_name' => 'FAQ',
			'add_new' => 'Add New FAQ',
			'add_new_item' => 'Add New FAQ',
			'edit_item' => 'Edit FAQ',
			'new_item' => 'New FAQ',
			'view_item' => 'View FAQ',
			'search_items' => 'Search FAQs',
			'not_found' => 'No FAQs Found',
			'not_found_in_trash' => 'No FAQs Found In Trash'
		),
	);

	/* Register the faq post type */
	register_post_type( 'lbd_faq', $faq_args );

}
