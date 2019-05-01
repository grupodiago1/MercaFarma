<?php
function wpdocs_scripts_method() {
  wp_enqueue_script( 'forms-script', get_stylesheet_directory_uri() . '/js/formulario.js', array( 'jquery' ), true );
  wp_localize_script( 'forms-script', 'variables', array('ajax_url' => admin_url( 'admin-ajax.php' )));
}
add_action( 'wp_enqueue_scripts', 'wpdocs_scripts_method' );


function envia_correo() {
  $para = $_REQUEST['para'];
  $nombre = $_REQUEST['nombre'];
  $correo = $_REQUEST['correo'];
  $celular = $_REQUEST['celular'];
  $subject="Formulario de reclutamiento";

  $message="Nombre: ".$nombre." | Correo: ".$correo." | Celular: ".$celular;


  $headers = array(
    'Content-Type: text/html; charset=UTF-8',
    'From: MercaFarma <info@mercafarma.com.gt>'.'\r\n',
  );
  if(wp_mail( $para, $subject, $message, $headers )){
    echo 'Formulario enviado exitosamente.';
  }else{
    echo 'Ocurrió un error, intentelo nuevamente o más tarde.';
  }

	die();
}


add_action( 'wp_ajax_nopriv_envia_correo', 'envia_correo' );
add_action( 'wp_ajax_envia_correo', 'envia_correo' );
