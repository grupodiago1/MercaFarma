<?php
add_action( 'fm_post_productos', function() {
  $fm = new Fieldmanager_Group( array(
    'name' => 'informacion_producto',
    'children' => array(
      'compuesto' => new Fieldmanager_RichTextArea( 'Compuesto' ),
      'indicaciones' => new Fieldmanager_RichTextArea( 'Indicaciones' ),
      'dosis' => new Fieldmanager_RichTextArea( 'Dosis' ),
    ),
  ) );
  $fm->add_meta_box( 'Información de producto (Resumen)', 'productos' );
} );
