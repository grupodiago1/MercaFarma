<?php
get_header();

$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );

if ( is_singular() ) {
	if ( is_singular('productos') ) {
			get_template_part( 'template-parts/single' , 'productos');
	}else{
		if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ) {
			get_template_part( 'template-parts/single' );
		}
	}
} elseif ( is_archive() || is_home() || is_search() ) {
	if(is_tax('categoria')){
		get_template_part( 'template-parts/archive','categoria' );
	}elseif(is_tax('casa')){
		get_template_part( 'template-parts/archive','casa' );
	}elseif ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'archive' ) ) {
		get_template_part( 'template-parts/archive' );
	}
} else {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ) {
		get_template_part( 'template-parts/404' );
	}
}

get_footer();
