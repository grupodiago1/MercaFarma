<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       3.0.12
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}
/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'kirki_demo', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);
/**
 * Add a panel.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/panels.html
 */
Kirki::add_panel(
	'kinetic_options_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Kinetic Options Panel', 'kinetic' ),
		'description' => esc_attr__( 'Config Your Theme Options Here.', 'kinetic' ),
	)
);
/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/sections.html
 */
$sections = array(
	'body'      => array( esc_attr__( 'Main Body Style', 'kinetic' ), '' ),
	'header'      => array( esc_attr__( 'Header Settings', 'kinetic' ), '' ),
	'blog'      => array( esc_attr__( 'BLog Settings', 'kinetic' ), '' ),
	'portfolio'      => array( esc_attr__( 'Portfolio Settings', 'kinetic' ), '' ),
	'copyright'      => array( esc_attr__( 'Footer Settings', 'kinetic' ), '' ),
	'typo'      => array( esc_attr__( 'Typography Settings', 'kinetic' ), '' ),
	
	
);
foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'kinetic_options_panel',
	);
	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}
	Kirki::add_section( str_replace( '-', '_', $section_id ) . '_section', $section_args );
}
/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function my_config_kirki_add_field( $args ) {
	Kirki::add_field( 'kirki_demo', $args );
}
/**
 * Background Control.
 *
 * @todo Triggers change on load.
 */
/**BLOG CONTROLS**/



my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'main_color',
		'label'       => esc_attr__( 'Chose Main Color 1', 'kinetic' ),
		'description' => esc_attr__( 'Chose your Main Color Style.', 'kinetic' ),
		'section'     => 'body_section',
		'default'     => '#6633cc',
		
	)
);


my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'blog_title',
		'label'       => esc_attr__( 'Blog Heading Title', 'kinetic' ),
		'description' => esc_attr__( 'insert your blog default title', 'kinetic' ),
		'section'     => 'header_section',
		'default'     => esc_html__('Our Blog','kinetic'),
	)
);
my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'sub_title',
		'label'       => esc_attr__( 'Blog Sub Title', 'kinetic' ),
		'description' => esc_attr__( 'insert your blog default title', 'kinetic' ),
		'section'     => 'header_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'btn_text',
		'label'       => esc_attr__( 'Header Button Text', 'kinetic' ),
		'description' => '',
		'section'     => 'header_section',
		'default'     => esc_attr__( 'Download', 'kinetic' ),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'btn_link',
		'label'       => esc_attr__( 'Header Button Link', 'kinetic' ),
		'description' => '',
		'section'     => 'header_section',
		'default'     => '',
	)
);


/**Single Ad**/

my_config_kirki_add_field(
	array(
		'type'        => 'select',
		'settings'    => 'footer_layout',
		'label'       => esc_attr__( 'Footer Style', 'kinetic' ),
		'description' => esc_attr__( 'Set your default Footer Style.', 'kinetic' ),
		'section'     => 'copyright_section',
		'default'     => '1',
		'placeholder' => esc_attr__( 'Select an option', 'kinetic' ),
		'choices'     => array(
			'1' => esc_html__( 'Default', 'kinetic' ),
            '2' => esc_html__( 'Pattern Background', 'kinetic' ),
            '3' => esc_html__( 'Dark Background', 'kinetic' ),
			
		),
	)
);



my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'facebook_url',
		'label'       => esc_attr__( 'Facebook', 'kinetic' ),
		'description' => esc_attr__( 'insert your facebook url', 'kinetic' ),
		'section'     => 'copyright_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'twitter_url',
		'label'       => esc_attr__( 'Twitter', 'kinetic' ),
		'description' => esc_attr__( 'insert your twitter url', 'kinetic' ),
		'section'     => 'copyright_section',
		'default'     => '',
	)
);
my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'youtube',
		'label'       => esc_attr__( 'Youtube', 'kinetic' ),
		'description' => esc_attr__( 'insert your google+ url', 'kinetic' ),
		'section'     => 'copyright_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'instagram_url',
		'label'       => esc_attr__( 'Instagram', 'kinetic' ),
		'description' => esc_attr__( 'insert your instagram url', 'kinetic' ),
		'section'     => 'copyright_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'linkedin_url',
		'label'       => esc_attr__( 'Linkedin', 'kinetic' ),
		'description' => esc_attr__( 'insert your linkedin url', 'kinetic' ),
		'section'     => 'copyright_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'copyright',
		'label'       => esc_attr__( 'Copyright', 'kinetic' ),
		'description' => esc_attr__( 'insert your Copyright text', 'kinetic' ),
		'section'     => 'copyright_section',
		'default'     => esc_html__('&copy; Copyright By Nunforest 2019','kinetic'),
	)
);
/****/
my_config_kirki_add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'main_typo',
		'label'       => esc_attr__( 'Body Typography', 'kinetic' ),
		'section'     => 'typo_section',
		'default'     => array(
			'font-family'    => 'Source Sans Pro',
			'font-size'      => '18px',
			'line-height'    => '24px',
			'variant'    => 300,
			'color'          => '#888',

		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => 'body, .paragraph, p',
			),
		),
	)
);



my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'map_api',
		'label'       => esc_attr__( 'Google Map API', 'kinetic' ),
		'section'     => 'body_section',
		'default'     => '',
	)
);
