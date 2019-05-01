(function( $ ) {

  "use strict";
  $(document).ready(function($) {
    var boton="#click-reclutamiento-form";
    $(boton).on('click', function(e){
      e.preventDefault();
      $.ajax({
        url : variables.ajax_url,
        data : {
          para : $(boton).data( "email" ),
          action : 'envia_correo',
          nombre : $("#nombre").val(),
          correo : $("#correo").val(),
          celular : $("#celular").val(),
        },
        beforeSend: function() {
          //$(boton).attr("disabled", true);
          $(boton).attr('value','Enviando...');
        },
        success : function( response ) {
          console.log(response);
          alert(response);
          $(boton).attr('value','Enviado');
        }
      });
    });

  });
})(jQuery);
