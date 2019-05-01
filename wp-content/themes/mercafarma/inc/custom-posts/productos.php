<?php

// Register Custom Post Type Productos
function create_productos_cpt() {

	$labels = array(
		'name' => _x( 'Productos', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Productos', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Productos', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Productos', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Archivos de Productos', 'textdomain' ),
		'attributes' => __( 'Atributos de Productos', 'textdomain' ),
		'parent_item_colon' => __( 'Padres de Productos:', 'textdomain' ),
		'all_items' => __( 'Todos los Productos', 'textdomain' ),
		'add_new_item' => __( 'Añadir nuevo Producto', 'textdomain' ),
		'add_new' => __( 'Añadir nuevo', 'textdomain' ),
		'new_item' => __( 'Nuevo Producto', 'textdomain' ),
		'edit_item' => __( 'Editar Producto', 'textdomain' ),
		'update_item' => __( 'Actualizar Producto', 'textdomain' ),
		'view_item' => __( 'Ver Producto', 'textdomain' ),
		'view_items' => __( 'Ver Productos', 'textdomain' ),
		'search_items' => __( 'Buscar Productos', 'textdomain' ),
		'not_found' => __( 'No se encontraron Productos.', 'textdomain' ),
		'not_found_in_trash' => __( 'Ningún Productos encontrado en la papelera.', 'textdomain' ),
		'featured_image' => __( 'Imagen destacada', 'textdomain' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'textdomain' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'textdomain' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'textdomain' ),
		'insert_into_item' => __( 'Insertar en Producto', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Subido a este Producto', 'textdomain' ),
		'items_list' => __( 'Lista de Productos', 'textdomain' ),
		'items_list_navigation' => __( 'Navegación por el listado de Productos', 'textdomain' ),
		'filter_items_list' => __( 'Lista de Productos filtrados', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Productos', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-products',
		'supports' => array('title', 'thumbnail', 'revisions'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'productos', $args );

}
add_action( 'init', 'create_productos_cpt', 0 );
