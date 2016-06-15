    $(function () {

      $( ".btn-clear" ).click(function() {
        senddataajax("clear","reconocimientousuario","usre="+$(this).attr("data-usre"));
        redirectpage("usuarios");
      });

      $( "#form-recognition button" ).click(function() {
        senddataajax("create","reconocimientousuario","honor="+$("#honor").select2('val')+"&user="+$(this).attr("data-user")+"&name="+$(this).attr("data-name"));
        redirectpage("usuarios");
      });

     $(".select2").select2();

    });
