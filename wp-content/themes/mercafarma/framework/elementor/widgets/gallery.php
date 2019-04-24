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

class Kinetic_Elementor_Global_Widgets_Gallery extends Widget_Base {

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Gallery_Carousel widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Kinetic-Global-Widgets-Gallery';
	}

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Gallery_Carousel widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Kinetic Gallery', 'kinetic' );
	}

	/**
	 * Retrieve Kinetic_Elementor_Global_Widgets_Gallery_Carousel widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Kinetic_Elementor_Global_Widgets_Gallery_Carousel widget belongs to.
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
	 * Register Kinetic_Elementor_Global_Widgets_Gallery_Carousel widget controls.
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
				'label' => esc_html__( 'Gallery', 'kinetic' ),
			)
		);

		$this->add_control(
			'client',
			[
				'label' => esc_html__( 'Gallery List', 'kinetic' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'client_title' => esc_html__( 'Gallery #1', 'kinetic' ),
						
					],
					[
						'client_title' => esc_html__( 'Gallery #2', 'kinetic' ),
						
					],
				],
				'fields' => [

					
					[
						'name' => 'image',
						'label' => esc_html__( 'Image', 'kinetic' ),
						'type' => Controls_Manager::MEDIA,
						'default' => '',
						'label_block' => true,
					],[
						'name' => 'title',
						'label' => esc_html__( 'Title', 'kinetic' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Client Name' , 'kinetic' ),
						'label_block' => true,
					],[
						'name' => 'subtitle',
						'label' => esc_html__( 'Subtitle', 'kinetic' ),
						'type' => Controls_Manager::TEXT,
						'default' => '#',
						'label_block' => true,
					],[
						'name' => 'filter_class',
						'label' => esc_html__( 'Filter Class', 'kinetic' ),
						'type' => Controls_Manager::TEXT,
						'default' => '',
						'label_block' => true,
					]
				],
				'title_field' => '{{{ title }}}',
			]
		);

		
		$this->end_controls_section();


	}

	/**
	 * Render Kinetic_Elementor_Global_Widgets_Gallery_Carousel widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		?>

		<div class="gallery-box iso-call">
			
				<?php  $j=0; foreach ( $settings['client'] as $item ) { ?>
					<div class="gal-project <?php echo esc_html($item['filter_class']);?>">
						<img src="<?php echo esc_url($item['image']['url']);?>" alt="<?php echo esc_attr($item['title']);?>">
						<div class="hover-gal">
							<div class="inner-gal">
								<h2 class="heading2"><?php echo esc_html($item['title']);?></h2>
								<span><?php echo esc_html($item['subtitle']);?></span>
							</div>
						</div>
					</div>


				<?php $j++; } ?>
			
		</div>


		<?php 

	}
}
