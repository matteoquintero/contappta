    $(function () {

      $( ".btn-edit" ).click(function() {
        $("#form-edit input").val( $(this).attr("data-user") );
        $("#form-edit").submit();
      });

      $( ".btn-guardians" ).click(function() {
        $("#form-guardians input").val( $(this).attr("data-user") );
        $("#form-guardians").submit();
      });

    });
