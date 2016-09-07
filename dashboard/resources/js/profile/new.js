function step1 () {
  if (!$('input[name=template]:checked', '#form-news').length<=0 ) {
    $("#step-1").hide();
    $("#btn-step-1").hide();
    var template=$('input[name=template]:checked', '#form-news').val();
    switch(template){
      case "1":
        $("#group-image").hide();
        $("#group-video").hide();
      break;
      case "2":
        $("#group-video").hide();
      break;
      case "3":
        $("#group-video").hide();
      break;
      case "4":
        $("#group-image").hide();
      break;
    }
    $("#btn-step-2").show();
    $("#step-2").show();
    $("#btn-html").show();

  }else{return false;}
  return false;
}

function step2(){
	var form = $('#form-news');
  var fileone = $('#image');
  var filetwo = $('#download');
	showerrors(form);
	form.validate({
					rules: {
							"sender[]":{
									required:true,
                  minlength:true
							},
						 subject:{
						 			required:true,
                  maxlength:70
							},
              description:{
                  required:true,
              },
              datepublication:{
                required: function (element) {
                     if($("#publishnow").is(':checked')){
                      return false;
                     }else{
                      return true;
                     }
                  }
              }
					},
					messages: {
							"sender[]":{
									required:"Por favor, selecione al menos un remitente.",
                  minlength:"Por favor, selecione al menos un remitente.",
							},
              subject:{
                  required:"Por favor, escriba el asunto.",
                  maxlength:"Maximo 70 caracteres",
              },
              description:{
                  required:"Por favor, escriba la descripción.",
              },
              datepublication:{
                  required:"Por favor, escriba la fecha a publicar o si se publica ahora mismo",
              }
					}
	});

	if (form.valid()) {

    var action=form.attr("data-action");
    var url=$("#video").val();
    if (url) {
      var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
      $("#videoid").val(videoid[1]);
    }

    var finale=sendformfileajax(action,"noticia",form,fileone,filetwo);
		switch (finale[0]){
				case true: redirectpage("noticias"); break;
				case false:
          switch(action){
            case "create":
              redirectpage("crear-noticia");
            break;
            case "update":
              redirectpage("modificar-noticia");
            break;
          }
        break;
			}

	}else{return false;}
	return false;
}

$(document).ready(function() {
  $( "#btn-html" ).click(function() {

    $("#editor").html($("#description").val());

    $( "#editor-content" ).animate({
      opacity: 1,
      top: 0,
      height: "100%"
    }, 2000, function() {

    });

  });

  $( "#editor-content i" ).click(function() {

    $("#description").val($("#editor").html());

    $( "#editor-content" ).animate({
      opacity: 0,
      top: "-100%",
      height: 0
    }, 2000, function() {

    });

  });

  $('#editor').notebook({
    autoFocus: true,
    placeholder: 'Type something awesome...'
  });

  $("[data-mask]").inputmask("datetime");
  $(".select2").select2();
  $("#btn-step-2").hide();
  $("#step-2").hide();
  $("#btn-html").hide();
  $( "#btn-step-1" ).click(function() { step1() });
  $( "#btn-step-2" ).click(function() { step2() });
  $( "#btn-update" ).click(function() { step2() });
});
