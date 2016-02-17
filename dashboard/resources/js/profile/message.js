function message(){
	var form = $('#form-messages');
  var inputfile = $('#image');

	showerrors(form);
	form.validate({
					rules: {
							"sender[]":{
									required:true,
                  minlength:true
							},
              dispatch:{
                   require_from_group: [1, ".message"]
              },
              image:{
                   require_from_group: [1, ".message"]
              }
					},
					messages: {
							"sender[]":{
									required:"Por favor, selecione al menos un remitente.",
                  minlength:"Por favor, selecione al menos un remitente.",
							},
              dispatch:{
                  require_from_group:"Por favor, escriba un mensaje o suba una imagen.",
              },
              image:{
                  require_from_group:"Por favor, escriba un mensaje o suba una imagen.",
              }
					}
	});

	if (form.valid()) {

    var action=form.attr("data-action");
    var finale=sendformfileajax(action,"mensaje",form,inputfile);
		switch (finale[0]){
				case true: redirectpage("mensajes"); break;
				case false:
          switch(action){
            case "create":
              redirectpage("crear-mensaje");
            break;
            case "update":
              redirectpage("modificar-mensaje");
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
  $( "form button" ).click(function() { message() });
});
