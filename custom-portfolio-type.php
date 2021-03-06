<?php
/*
Plugin Name: Custom Portfolio Post Type
Plugin URI: http://matturenovich.me
Description: Custom Portfolio Post Type Plugin created for my Personal Portfolio Site
Version: 0.1
Author: Matt Urenovich
Author URI: http://matturenovich.me
License: GPLv2 (http://www.gnu.org/licenses/gpl-2.0.html)
*/

/* 
Version Requirement Check
Deactivates plugin automatically if WordPress Version is below 4.0
*/
register_activation_hook( __FILE__, 'mattu_version_check' );

function mattu_version_check() {
	if ( version_compare( get_bloginfo( 'version' ), '4.0', '<' ) ) {
		deactivate_plugins( basename( __FILE__ ) ); // Deactivate Our Plugin
	}
}

/**
 * Custom taxonomy
 */

/* Set up the post types */
add_action( 'init', 'mattu_portfolio_register_post_types' );

/* Registers post types */
function mattu_portfolio_register_post_types() {
	/* Set up the arguments for the 'portfolio' post type. */
	$portfolio_args = array(
		'public' => true,
		'query_var' => 'portfolio',
		'rewrite' => array(
			'slug' => 'portfolio',
			'with_front' => false,
			'feeds' => false
		),
		'has_archive' => true,
		'menu_icon' => 'dashicons-images-alt',
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
			'page-attributes',
			'excerpt'
		),
		'labels' => array (
			'name' => 'Portfolio',
			'singular_name' => 'Portfolio',
			'add_new' => 'Add Project',
			'add_new_item' => 'Add New Project',
			'edit_item' => 'Edit Project',
			'new_item' => 'New Project',
			'view_item' => 'View Project',
			'search_items' => 'Search Projects',
			'not_found' => 'No Projects Found',
			'not_found_in_trash' => 'No Projects Found in Trash'
		),
		'taxonomies' => array(
			'post_tag',
			'category'
		),
		'can_export' => true,
	);

	/* Register the portfolio post type */
	register_post_type( 'portfolio', $portfolio_args );
}



?>