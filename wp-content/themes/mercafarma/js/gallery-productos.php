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

class Kinetic_Elementor_Global_Widgets_Gallery_Productos extends Widget_Base {

	/**
	* Retrieve Kinetic_Elementor_Global_Widgets_Gallery_Productos widget name.
	*
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'Kinetic-Global-Widgets-Gallery-Productos';
	}

	/**
	* Retrieve Kinetic_Elementor_Global_Widgets_Gallery_Productos widget title.
	*
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Gallery Productos', 'kinetic' );
	}

	/**
	* Retrieve Kinetic_Elementor_Global_Widgets_Gallery_Productos widget icon.
	*
	* @access public
	*
	* @return string Widget icon.
	*/
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	* Retrieve the list of categories the Kinetic_Elementor_Global_Widgets_Gallery_Productos widget belongs to.
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
	* Register Kinetic_Elementor_Global_Widgets_Gallery_Productos widget controls.
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
				'label' => esc_html__( 'Gallery Productos', 'kinetic' ),
			)
		);

		$this->add_control(
			'no_sliders',
			[
				'label' => __( '# Máximo de Sliders', 'kinetic' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Ingrese un número', 'kinetic' ),
				'default' => '5',
				'label_block' => true,
			]
		);

		$this->add_control(
			'order_sliders',
			[
				'label' => __( 'Orden', 'kinetic' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'date' => __( 'Default', 'kinetic' ),
					'rand' => __( 'Random', 'plugin-name' ),
				],
				'default' => 'date',
			]
		);

		$this->end_controls_section();


	}

	/**
	* Render Kinetic_Elementor_Global_Widgets_Gallery_Productos widget output on the frontend.
	*
	* Written in PHP and used to generate the final HTML.
	*
	* @access protected
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div id="carousel-productos" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">

				<?php
				$j=0;
				$class="active";

				$args = array(
					'post_type' => 'productos',
					'posts_per_page' => $settings['no_sliders'],
					'orderby' => $settings['order_sliders'],
				);

				$query = new \WP_Query($args);
				$return=array();
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();

						$ID=get_the_ID();
						$link=get_the_permalink($ID);
						$title = get_the_title($ID);
						if(has_post_thumbnail()){
							$thumbnail =get_the_post_thumbnail_url($ID, 'full');
						}

						$c_fields=get_post_meta($ID, 'informacion_producto' , true);

						$compuesto = isset($c_fields['compuesto'])? $c_fields['compuesto']:'';
						$indicaciones = isset($c_fields['indicaciones'])?$c_fields['indicaciones']:'';
						$dosis = isset($c_fields['dosis'])?$c_fields['dosis']:'';


						?>

						<div class="item <?php echo $class;?>">
							<div class="row">
								<div class="col-xs-12 visible-xs">
									<div class="product-box">
										<h1 class="title-box"><?php echo $title;?></h1>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

									<img class="img-fluid" src="<?php echo esc_url($thumbnail);?>" alt="<?php echo esc_attr($title);?>">
								</div>
								<div class="hidden-xs col-sm-6 col-md-6 col-lg-6 ">
									<div class="product-box">
										<h1 class="title-box"><?php echo $title;?></h1>
										<div class="info-box">
											<h2 class="title">Indicaciones: </h2>
											<div class="text">
												<?php echo $indicaciones;?>
											</div>
										</div>
										<div class="info-box">
											<h2 class="title">Dosis: </h2>
											<div class="text">
												<?php echo $dosis;?>
											</div>
										</div>
										<a class="link-box" href="<?php echo $link;?>">Quiero saber más <i class="la la-long-arrow-right"></i></a>
									</div>
								</div>
							</div>


						</div>

						<?php
						$j++;
						$class="";
					}

					wp_reset_postdata();
				} else {

				}


				?>

			</div>

			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php $class="active"; 	for ($i = 1; $i <= $j; $i++) { ?>
					<li data-target="#carousel-productos" data-slide-to="<?php echo $i?>" class="<?php echo $class;?>"></li>
					<?php $class="";}?>

				</ol>


				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-productos" role="button" data-slide="prev">
					<span class="la la-arrow-circle-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-productos" role="button" data-slide="next">
					<span class="la la-arrow-circle-right" aria-hidden="true"></span>

					<span class="sr-only">Next</span>
				</a>
			</div>


			<?php

		}
	}
