    $(function () {

      $( ".btn-edit" ).click(function() {
        $("#form-edit input").val( $(this).attr("data-new") );
        $("#form-edit").submit();
      });

      $( ".btn-sender" ).click(function() {
        $("#form-sender input").val( $(this).attr("data-new") );
        $("#form-sender").submit();
      });

      $( ".btn-answer" ).click(function() {
        $("#form-answer input").val( $(this).attr("data-new") );
        $("#form-answer").submit();
      });

      $( ".btn-clear" ).click(function() {
        senddataajax("clear","noticia","new="+$(this).attr("data-new"));
        redirectpage("noticias");
      });

    });
