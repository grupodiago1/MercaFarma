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

class Kinetic_Elementor_Global_Widgets_Title extends Widget_Base {

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Title widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Kinetic-Global-Widgets-Title';
	}

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Title widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'QK Title', 'kinetic' );
	}

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Title widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Kinetic_Elementor_Global_Widgets_Title widget belongs to.
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
	 * Register Kinetic_Elementor_Global_Widgets_Title widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_colormag_featured_posts_block_1_title_manage',
			array(
				'label' => esc_html__( 'Block Title', 'kinetic' ),
			)
		);

		$this->add_control(
			'widget_title',
			array(
				'label'       => esc_html__( 'Title:', 'kinetic' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your custom block title', 'kinetic' ),
				'label_block' => true,
			)
		);
		
		$this->add_control(
		    'subtitle',
		    [
		        'label' => esc_html__( 'SubTitle', 'kinetic' ),
		        'type' => Controls_Manager::TEXTAREA,
		        
		    ]
		);
		$this->add_control(
		    'desc',
		    [
		        'label' => esc_html__( 'Description', 'kinetic' ),
		        'type' => Controls_Manager::TEXTAREA,
		        
		    ]
		);
		$this->add_control(
		    'ex_class',
		    [
		        'label' => esc_html__( 'Custom Class', 'kinetic' ),
		        'type' => Controls_Manager::TEXT,
		        
		    ]
		);


		$this->end_controls_section();

	}

	/**
	 * Render Kinetic_Elementor_Global_Widgets_Title widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( ! empty( $settings['widget_title']) ) : ?>
			<div class="title-section<?php if($settings['ex_class']!=''){ echo ' '.esc_attr($settings['ex_class']); }?>">
				<?php if ( ! empty( $settings['subtitle'] ) ){ ?>
					<span><?php echo do_shortcode($settings['subtitle']); ?></span>
				<?php } ?>
				<h1 class="heading1"><?php echo do_shortcode($settings['widget_title']); ?> </h1>
				<?php if ( ! empty( $settings['desc'] ) ){ ?>
					<p><?php echo do_shortcode($settings['desc']); ?></p>
				<?php } ?>
			</div>
			<?php
		endif;

	}
}
