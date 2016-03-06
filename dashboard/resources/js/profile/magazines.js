    $(function () {

      $( ".btn-edit" ).click(function() {
        $("#form-edit input").val( $(this).attr("data-magazine") );
        $("#form-edit").submit();
      });

    });
