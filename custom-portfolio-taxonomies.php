<?php
/**
 * Create a custom taxonomy for the portfolio custom post type
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */

/* Registers Taxonomies */
function mattu_portfolio_register_taxonomies() {

	/* Set up the project types taxonomy arguments. */
	$types_args = array(
		'labels'            => array(
		'name'					=> 'Types',
		'singular_name'			=> 'Type',
		'search_items'			=> 'Search Types',
		'popular_items'			=> 'Popular Types',
		'all_items'				=> 'All Types',
		'parent_item'			=> 'Parent Type',
		'parent_item_colon'		=> 'Parent Type',
		'edit_item'				=> 'Edit Type',
		'update_item'			=> 'Update Type',
		'add_new_item'			=> 'Add New Type',
		'new_item_name'			=> 'New Type Name',
		'add_or_remove_items'	=> 'Add or remove Types',
		'choose_from_most_used'	=> 'Choose from most used Type',
		'menu_name'				=> 'Type',
	),
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'rewrite'           => array(
			'slug'			=> 'portfolio/project-type',
			'with_front'	=> false
		),
		'query_var'         => 'portfolio_type',
		'capabilities'      => array(),
	);


	register_taxonomy( 'taxonomy-slug', array( 'portfolio' ), $types_args );
}

add_action( 'init', 'mattu_portfolio_register_taxonomies' );



?>