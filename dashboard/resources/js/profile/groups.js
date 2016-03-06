    $(function () {

      $( ".btn-edit" ).click(function() {

        $("#form-edit input").val( $(this).attr("data-group") );
        $("#form-edit").submit();

      });

    });
