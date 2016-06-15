    $(function () {

      $( ".btn-edit" ).click(function() {
        $("#form-edit input").val( $(this).attr("data-event") );
        $("#form-edit").submit();
      });

      $( ".btn-sender" ).click(function() {
        $("#form-sender input").val( $(this).attr("data-event") );
        $("#form-sender").submit();
      });

      $( ".btn-clear" ).click(function() {
        senddataajax("clear","evento","event="+$(this).attr("data-event"));
        redirectpage("eventos");
      });

    });
