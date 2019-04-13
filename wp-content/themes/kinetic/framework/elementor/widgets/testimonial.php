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

class Kinetic_Elementor_Global_Widgets_Testimonials extends Widget_Base {

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Testimonials widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Kinetic-Global-Widgets-Testimonials';
	}

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Testimonials widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Kinetic Testimonials', 'kinetic' );
	}

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Testimonials widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Kinetic_Elementor_Global_Widgets_Testimonials widget belongs to.
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
	 * Register Kinetic_Elementor_Global_Widgets_Testimonials widget controls.
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
				'label' => esc_html__( 'Testimonials Logo', 'kinetic' ),
			)
		);

		$this->add_control(
			'client',
			[
				'label' => esc_html__( 'Testimonials List', 'kinetic' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'client_title' => esc_html__( 'Testimonials #1', 'kinetic' ),

					],
					[
						'client_title' => esc_html__( 'Testimonials #2', 'kinetic' ),

					],
				],
				'fields' => [


					[
						'name' => 'client_title',
						'label' => esc_html__( 'Title', 'kinetic' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Testimonial Title' , 'kinetic' ),
						'label_block' => true,
					],[
						'name' => 'client_content',
						'label' => esc_html__( 'Description', 'kinetic' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => '#',
						'label_block' => true,
					],[
						'name' => 'client_name',
						'label' => esc_html__( 'Name', 'kinetic' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Client Name' , 'kinetic' ),
						'label_block' => true,
					]
					,[
						'name' => 'client_icon_class',
						'label' => esc_html__( 'Icon Class', 'kinetic' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'frown-o' , 'kinetic' ),
						'label_block' => true,
					]
				],
				'title_field' => '{{{ client_title }}}',
			]
		);


		$this->end_controls_section();


	}

	/**
	 * Render Kinetic_Elementor_Global_Widgets_Testimonials widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

		<div class="testimonial-box owl-wrapper">

			<div class="owl-carousel" data-num="2">

				<?php  $j=0; foreach ( $settings['client'] as $item ) { ?>

					<div class="item">
						<div class="testimonial-post">
							<span class="quote">
								<i class="la la-<?php echo esc_attr($item['client_icon_class']);?>"></i>
							</span>
							<!--<span class="rating">
								<i class="la la-star"></i>
								<i class="la la-star"></i>
								<i class="la la-star"></i>
								<i class="la la-star"></i>
								<i class="la la-star"></i>
							</span>-->
							<h2 class="heading2"><?php echo esc_html($item['client_title']);?></h2>
							<p>“ <?php echo do_shortcode($item['client_content']);?> ”</p>
							<span class="name-quote"><?php echo esc_html($item['client_name']);?></span>
						</div>
					</div>

				<?php $j++; } ?>

			</div>
		</div>



		<?php

	}
}
