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

class Kinetic_Elementor_Global_Widgets_Menu_Catalogo extends Widget_Base {

	/**
	* Retrieve Kinetic_Elementor_Global_Widgets_Menu_Catalogo widget name.
	*
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'Kinetic-Global-Widgets-Menu-Catalogo';
	}

	/**
	* Retrieve Kinetic_Elementor_Global_Widgets_Menu_Catalogo widget title.
	*
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return esc_html__( 'Menu Catalogo', 'kinetic' );
	}

	/**
	* Retrieve Kinetic_Elementor_Global_Widgets_Menu_Catalogo widget icon.
	*
	* @access public
	*
	* @return string Widget icon.
	*/
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	* Retrieve the list of categories the Kinetic_Elementor_Global_Widgets_Menu_Catalogo widget belongs to.
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
	* Register Kinetic_Elementor_Global_Widgets_Menu_Catalogo widget controls.
	*
	* Adds different input fields to allow the user to change and customize the widget settings.
	*
	* @access protected
	*/
	protected function _register_controls() {
	}

	/**
	* Render Kinetic_Elementor_Global_Widgets_Menu_Catalogo widget output on the frontend.
	*
	* Written in PHP and used to generate the final HTML.
	*
	* @access protected
	*/
	protected function render() {


		$taxonomies = get_terms( array(
			'taxonomy' => 'categoria',
			'hide_empty' => false,
		) );
		$count=0;
		$itemRight='';
		$itemLeft='';
		if  ($taxonomies) {
			foreach ($taxonomies  as $taxonomy ) {
				if($count % 2 == 0){
					$itemRight .= '<li class="cont-items"><a class="btn btn-menu-catalogo" href="'.get_term_link($taxonomy).'">'. $taxonomy->name .'</a></li>';
				}else{
					$itemLeft .= '<li class="cont-items"><a class="btn btn-menu-catalogo" href="'.get_term_link($taxonomy).'">'. $taxonomy->name .'</a></li>';
				}
				$count++;
			}
		}
		?>


		<div class="cont-menu-catalogo">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-lg-offset-2 text-right cont-menu">
					<ul class="list-unstyled">
						<?php echo $itemRight;?>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-left cont-menu">
					<ul class="list-unstyled  cont-items">
						<?php echo $itemLeft;?>
					</ul>
				</div>
			</div>
			<img width="50" style="position:absolute;bottom:0;right:0;" src="<?php echo  get_stylesheet_directory_uri().'/images/isotipo.png'?>"/>
		</div>

		<?php

	}
}
