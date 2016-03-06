    $(function () {

      $( ".btn-edit" ).click(function() {
        $("#form-edit input").val( $(this).attr("data-honor") );
        $("#form-edit").submit();
      });

    });
