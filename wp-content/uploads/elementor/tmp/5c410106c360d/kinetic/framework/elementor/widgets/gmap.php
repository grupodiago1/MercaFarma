<?php
/**
 * Kinetic Elementor Global Widget Title.
 *
 * @package    Nunforest
 * @subpackage Kinetic
 * @since      Kinetic 1.2.3
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Kinetic_Elementor_Global_Widgets_Gmap extends Widget_Base {

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Gmap widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Kinetic-Global-Widgets-Gmap';
	}

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Gmap widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Kinetic Gmap', 'kinetic' );
	}

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Gmap widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Kinetic_Elementor_Global_Widgets_Gmap widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'kinetic-widget-blocks' );
	}
	
	/**
	 * Register Kinetic_Elementor_Global_Widgets_Gmap widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_arc_featured_posts_block_1_title_manage',
			array(
				'label' => esc_html__( 'Block Gmap', 'kinetic' ),
			)
		);

		$this->add_control(
		  'marker',
		  [
		     'label' => esc_html__( 'Choose Map Marker Image', 'kinetic' ),
		     'type' => Controls_Manager::MEDIA,
		     
		     
		  ]
		);

		$this->add_control(
		    'longitude',
		    [
		        'label' => esc_html__( 'Longitude', 'kinetic' ),
		        'type' => Controls_Manager::TEXT,
		        'label_block' => true,
		        'default' => '42.345573',
		        
		    ]
		);

		$this->add_control(
			'latitude',
			array(
				'label'       => esc_html__( 'Latitude:', 'kinetic' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your latitude', 'kinetic' ),
				'default' => '-71.038326',
				'label_block' => true,
			)
		);
		
		
		
		$this->add_control(
		    'zoom',
		    [
		        'label' => esc_html__( 'Map Zoom', 'kinetic' ),
		        'type' => Controls_Manager::TEXT,
		        'placeholder' => esc_html__( 'Add your google map Zoom', 'kinetic' ),
		        'label_block' => true,
		        'default' => 13
		        
		    ]
		);
		
		$this->add_control(
		    'height',
		    [
		        'label' => esc_html__( 'Map Height', 'kinetic' ),
		        'type' => Controls_Manager::TEXT,
		        'placeholder' => esc_html__( 'Add your google map Height (px)', 'kinetic' ),
		        'label_block' => true,
		        'default' => '350px'
		        
		    ]
		);
		$this->end_controls_section();


	}

	/**
	 * Render Kinetic_Elementor_Global_Widgets_Gmap widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$latitude = $this->get_settings( 'latitude' );
		$longitude = $this->get_settings( 'longitude' );
		$zoom = $this->get_settings( 'zoom' );
		$marker = $this->get_settings( 'marker' );
		$height = $this->get_settings( 'height' );
		
		?>
		<div <?php if($height!=''){ ?> style="height: <?php echo esc_attr($height); ?>" <?php } ?> class="map" data-latitude="<?php echo esc_attr($latitude); ?>" data-marker="<?php echo esc_attr($marker['url']); ?>" data-zoom="<?php echo esc_attr($zoom); ?>" data-longitude="<?php echo esc_attr($longitude); ?>"></div>

		

		<?php 

	}
}
