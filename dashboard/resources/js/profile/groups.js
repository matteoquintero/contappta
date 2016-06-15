    $(function () {

      $( ".btn-edit" ).click(function() {

        $("#form-edit input").val( $(this).attr("data-group") );
        $("#form-edit").submit();

      });

      $( ".btn-clear" ).click(function() {
        senddataajax("clear","grupo","group="+$(this).attr("data-group"));
        redirectpage("grupos");
      });

    });
