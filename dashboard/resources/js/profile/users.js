    $(function () {

      $( ".btn-edit" ).click(function() {
        $("#form-edit input").val( $(this).attr("data-user") );
        $("#form-edit").submit();
      });

      $( ".btn-guardians" ).click(function() {
        $("#form-guardians input").val( $(this).attr("data-user") );
        $("#form-guardians").submit();
      });

      $( ".btn-recognitions" ).click(function() {
        $("#form-recognitions input").val( $(this).attr("data-user") );
        $("#form-recognitions").submit();
      });

      $( ".btn-clear" ).click(function() {
        senddataajax("clear","usuario","user="+$(this).attr("data-user"));
        redirectpage("usuarios");
      });

    });
