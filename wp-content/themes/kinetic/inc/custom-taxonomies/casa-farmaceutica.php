<?php

// Register Taxonomy Casa Farmaceutica
function create_casafarmaceutica_tax() {

	$labels = array(
		'name'              => _x( 'Casa Farmaceutica', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Casa Farmaceutica', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Casa Farmaceutica', 'textdomain' ),
		'all_items'         => __( 'All Casa Farmaceutica', 'textdomain' ),
		'parent_item'       => __( 'Parent Casa Farmaceutica', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Casa Farmaceutica:', 'textdomain' ),
		'edit_item'         => __( 'Edit Casa Farmaceutica', 'textdomain' ),
		'update_item'       => __( 'Update Casa Farmaceutica', 'textdomain' ),
		'add_new_item'      => __( 'Add New Casa Farmaceutica', 'textdomain' ),
		'new_item_name'     => __( 'New Casa Farmaceutica Name', 'textdomain' ),
		'menu_name'         => __( 'Casa Farmaceutica', 'textdomain' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'textdomain' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
	);
	register_taxonomy( 'casa', array('productos'), $args );

}
add_action( 'init', 'create_casafarmaceutica_tax' );
