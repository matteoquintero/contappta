    $(function () {

      $( ".btn-edit" ).click(function() {
        $("#form-edit input").val( $(this).attr("data-message") );
        $("#form-edit").submit();
      });

      $( ".btn-sender" ).click(function() {
        $("#form-sender input").val( $(this).attr("data-message") );
        $("#form-sender").submit();
      });

    });
