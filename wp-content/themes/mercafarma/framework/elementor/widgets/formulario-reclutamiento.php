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

class Kinetic_Elementor_Global_Widgets_Formulario_Reclutamiento extends Widget_Base {

	/**
	* Retrieve Kinetic_Elementor_Global_Widgets_Formulario_Reclutamiento widget name.
	*
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'Kinetic-Global-Widgets-Formulario-Reclutamiento';
	}

	/**
	* Retrieve Kinetic_Elementor_Global_Widgets_Formulario_Reclutamiento widget title.
	*
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Formulario Reclutamiento', 'kinetic' );
	}

	/**
	* Retrieve Kinetic_Elementor_Global_Widgets_Formulario_Reclutamiento widget icon.
	*
	* @access public
	*
	* @return string Widget icon.
	*/
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	* Retrieve the list of categories the Kinetic_Elementor_Global_Widgets_Formulario_Reclutamiento widget belongs to.
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
	* Register Kinetic_Elementor_Global_Widgets_Formulario_Reclutamiento widget controls.
	*
	* Adds different input fields to allow the user to change and customize the widget settings.
	*
	* @access protected
	*/
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_arc_formulario_reclutamiento_block_1_title_manage',
			array(
				'label' => esc_html__( 'Gallery Productos', 'kinetic' ),
			)
		);

		$this->add_control(
			'email-recepcion',
			[
				'label' => __( 'Email destino', 'kinetic' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Ingrese un email', 'kinetic' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}

	/**
	* Render Kinetic_Elementor_Global_Widgets_Formulario_Reclutamiento widget output on the frontend.
	*
	* Written in PHP and used to generate the final HTML.
	*
	* @access protected
	*/
	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

		<footer class="white-style">
			<div class="container">
				<div class="title-section">
					<h1>Únete a nuestro equipo</h1>
				</div>
				<form class="subscribe-form" id="formulario-reclutamiento">
					<input type="text" name="nombre" id="nombre" placeholder="Nombre Completo"/><br/>
					<input type="text" name="correo" id="correo" placeholder="Correo Electrónico"/><br/>
					<input type="text" name="celular" id="celular" placeholder="Teléfono Celular"/><br/>
					<input type="submit" id="click-reclutamiento-form" value="Enviar" data-email="<?php echo $settings['email-recepcion'];?>"/>
				</form>
			</div>
		</footer>



		<?php

	}
}
