<?php

// Register Taxonomy Categoria
function create_categoria_tax() {

	$labels = array(
		'name'              => _x( 'Categoria', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Categoria', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Categoria', 'textdomain' ),
		'all_items'         => __( 'All Categoria', 'textdomain' ),
		'parent_item'       => __( 'Parent Categoria', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Categoria:', 'textdomain' ),
		'edit_item'         => __( 'Edit Categoria', 'textdomain' ),
		'update_item'       => __( 'Update Categoria', 'textdomain' ),
		'add_new_item'      => __( 'Add New Categoria', 'textdomain' ),
		'new_item_name'     => __( 'New Categoria Name', 'textdomain' ),
		'menu_name'         => __( 'Categoria', 'textdomain' ),
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
	register_taxonomy( 'categoria', array('productos'), $args );

}
add_action( 'init', 'create_categoria_tax' );
