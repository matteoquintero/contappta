    $(function () {

      $( ".btn-edit" ).click(function() {
        $("#form-edit input").val( $(this).attr("data-honor") );
        $("#form-edit").submit();
      });

      $( ".btn-clear" ).click(function() {
        senddataajax("clear","reconocimiento","honor="+$(this).attr("data-honor"));
        redirectpage("reconocimientos");
      });


    });
