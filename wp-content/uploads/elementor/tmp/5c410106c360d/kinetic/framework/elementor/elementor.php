<?php
/**
 * Implements the compatibility for the Elementor plugin in Kinetic  theme.
 *
 * @package    Nunforest
 * @subpackage Kinetic 
 * @since      Kinetic  1.2.3
 */


if ( ! function_exists( 'kinetic_elementor_active_page_check' ) ) :

	/**
	 * Check whether Elementor plugin is activated and is active on current page or not
	 *
	 * @return bool
	 *
	 * @since Kinetic  1.2.3
	 */
	function kinetic_elementor_active_page_check() {
		global $post;

		if ( defined( 'ELEMENTOR_VERSION' ) && get_post_meta( $post->ID, '_elementor_edit_mode', true ) ) {
			return true;
		}

		return false;
	}

endif;

if ( ! function_exists( 'kinetic_elementor_widget_render_filter' ) ) :

	/**
	 * Render the default WordPress widget settings, ie, divs
	 *
	 * @param $args the widget id
	 *
	 * @return array register sidebar divs
	 *
	 * @since Kinetic  1.2.3
	 */
	function kinetic_elementor_widget_render_filter( $args ) {

		return
			array(
				'before_widget' => '<section class="widget ' . kinetic_widget_class_names( $args[ 'widget_id' ] ) . ' clearfix">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="heading2 widget-title">',
				'after_title'   => '</h2>',
			);
	}

endif;

add_filter( 'elementor/widgets/wordpress/widget_args', 'kinetic_elementor_widget_render_filter' ); // WPCS: spelling ok.

if ( ! function_exists( 'kinetic_widget_class_names' ) ) :

	/**
	 * Render the widget classes for Elementor plugin compatibility
	 *
	 * @param $widgets_id the widgets of the id
	 *
	 * @return mixed the widget classes of the id passed
	 *
	 * @since Kinetic Decor 1.2.3
	 */
	function kinetic_widget_class_names( $widgets_id ) {

		$widgets_id = str_replace( 'wp-widget-', '', $widgets_id );

		$classes = kinetic_widgets_classes();

		$return_value = isset( $classes[ $widgets_id ] ) ? $classes[ $widgets_id ] : 'widget_featured_block';

		return $return_value;
	}

endif;

if ( ! function_exists( 'kinetic_widgets_classes' ) ) :

	/**
	 * Return all the arrays of widgets classes and classnames of same respectively
	 *
	 * @return array the array of widget classnames and its respective classes
	 *
	 * @since Kinetic Decor 1.2.3
	 */
	function kinetic_widgets_classes() {

		return
			array(
				'kinetic_featured_posts_slider_widget'   => 'widget_featured_slider widget_featured_meta',
				'kinetic_highlighted_posts_widget'       => 'widget_highlighted_posts widget_featured_meta',
				'kinetic_featured_posts_widget'          => 'widget_featured_posts widget_featured_meta',
				'kinetic_featured_posts_vertical_widget' => 'widget_featured_posts widget_featured_posts_vertical widget_featured_meta',
				'kinetic_728x90_advertisement_widget'    => 'widget_300x250_advertisement',
				'kinetic_300x250_advertisement_widget'   => 'widget_728x90_advertisement',
				'kinetic_125x125_advertisement_widget'   => 'widget_125x125_advertisement',
			);
	}

endif;

/**
 * Load the Kinetic Decor Elementor widgets file and registers it
 */
if ( ! function_exists( 'kinetic_elementor_widgets_registered' ) ) :

	/**
	 * Load and register the required Elementor widgets file
	 *
	 * @param $widgets_manager
	 *
	 * @since Kinetic Decor 1.2.3
	 */
	function kinetic_elementor_widgets_registered( $widgets_manager ) {

		// Require the files
		// 1. Block Widgets
		
		//require KINETIC_ELEMENTOR_WIDGETS_DIR . '/blog.php';
		require KINETIC_ELEMENTOR_WIDGETS_DIR . '/title.php';
		require KINETIC_ELEMENTOR_WIDGETS_DIR . '/blog-col.php';
		require KINETIC_ELEMENTOR_WIDGETS_DIR . '/blog-mas.php';
		require KINETIC_ELEMENTOR_WIDGETS_DIR . '/gallery-carousel.php';
		require KINETIC_ELEMENTOR_WIDGETS_DIR . '/testimonial.php';
		
		

		// Register the widgets
		// 1. Block Widgets
		
		$widgets_manager->register_widget_type( new \Elementor\Kinetic_Elementor_Global_Widgets_Title() );
		$widgets_manager->register_widget_type( new \Elementor\Kinetic_Elementor_Global_Widgets_Blog_Col() );
		$widgets_manager->register_widget_type( new \Elementor\Kinetic_Elementor_Global_Widgets_Blog_Masonry() );
		$widgets_manager->register_widget_type( new \Elementor\Kinetic_Elementor_Global_Widgets_Gallery_Carousel() );
		$widgets_manager->register_widget_type( new \Elementor\Kinetic_Elementor_Global_Widgets_Testimonials() );
		
		
	}

endif;

add_action( 'elementor/widgets/widgets_registered', 'kinetic_elementor_widgets_registered' );

if ( ! function_exists( 'kinetic_elementor_category' ) ) :

	/**
	 * Add the Elementor category for use in Kinetic Decor widgets as seperator
	 *
	 * @since Kinetic Decor 1.2.3
	 */
	function kinetic_elementor_category() {

		// Register widget block category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'kinetic-widget-blocks', array(
			'title' => esc_html__( 'Kinetic Decor Widget Blocks', 'kinetic' ),
		), 1 );

		// Register widget grid category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'kinetic-widget-grid', array(
			'title' => esc_html__( 'Kinetic Decor Widget Grid', 'kinetic' ),
		), 1 );

		// Register widget global category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'kinetic-widget-global', array(
			'title' => esc_html__( 'Kinetic Decor Global Widgets', 'kinetic' ),
		), 1 );
	}

endif;

add_action( 'elementor/init', 'kinetic_elementor_category' );

