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

  }else{return false;}
  return false;
}

function step2(){
	var form = $('#form-news');
  var inputfile = $('#image');
	showerrors(form);
	form.validate({
					rules: {
							"sender[]":{
									required:true,
                  minlength:true
							},
						 subject:{
						 			required:true,
							},
              description:{
                  required:true,
              },
              datepublication:{
                required:true
              }
					},
					messages: {
							"sender[]":{
									required:"Por favor, selecione al menos un remitente.",
                  minlength:"Por favor, selecione al menos un remitente.",
							},
              subject:{
                  required:"Por favor, escriba el asunto.",
              },
              description:{
                  required:"Por favor, escriba la descripción.",
              },
              datepublication:{
                  required:"Por favor, escriba la fecha a publicar.",
              },
					}
	});

	if (form.valid()) {

    var action=form.attr("data-action");
    var finale=sendformfileajax(action,"noticia",form,inputfile);
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

  $("[data-mask]").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
  $(".select2").select2();
  $("#btn-step-2").hide();
  $("#step-2").hide();
  $( "#btn-step-1" ).click(function() { step1() });
  $( "#btn-step-2" ).click(function() { step2() });
  $( "#btn-update" ).click(function() { step2() });
});
