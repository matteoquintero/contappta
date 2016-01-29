function news(){
	var form = jQuery('#form-news');
	showerrors(form);
	form.validate({
					rules: {
							sender:{
									required:true,
							},
						 subject:{
						 			required:true,
							},
              description:{
                  required:true,
              },
					},
					messages: {
							sender:{
									required:"Por favor, selecione al menos un remitente.",
							},
              subject:{
                  required:"Por favor, escriba el asunto.",
              },
              description:{
                  required:"Por favor, escriba la descripción.",
              },
					}
	});

	if (form.valid()) {

      var action=form.attr("data-action");
	    var finale=sendformajax(action,"noticia",form,"","json");

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
  $("[data-mask]").inputmask();
  $(".select2").select2();
  $( "form button" ).click(function() { news() });
});
