    $(function () {

      $( ".btn-edit" ).click(function() {

        $("#form-edit input").val( $(this).attr("data-institution") );
        $("#form-edit").submit();

      });

      $( ".btn-clear" ).click(function() {
        senddataajax("clear","institucion","institution="+$(this).attr("data-institution"));
        redirectpage("instituciones");
      });

    });
