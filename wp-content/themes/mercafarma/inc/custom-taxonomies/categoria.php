<?php

// Register Taxonomy Categoria
function create_categoria_tax() {

	$labels = array(
		'name'              => _x( 'Categoría', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Categoría', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Buscar Categoría', 'textdomain' ),
		'all_items'         => __( 'Todas las Categoría', 'textdomain' ),
		'parent_item'       => __( 'Categoría padre', 'textdomain' ),
		'parent_item_colon' => __( 'Categoría padre:', 'textdomain' ),
		'edit_item'         => __( 'Editar Categoría', 'textdomain' ),
		'update_item'       => __( 'Actualizar Categoría', 'textdomain' ),
		'add_new_item'      => __( 'Agregar Categoría', 'textdomain' ),
		'new_item_name'     => __( 'Nombre de Categoría nueva', 'textdomain' ),
		'menu_name'         => __( 'Categoría', 'textdomain' ),
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
