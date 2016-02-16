function events(){
	var form = $('#form-events');
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
              dateevent:{
                required:true
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
              dateevent:{
                  required:"Por favor, escriba la fecha del evento.",
              },
              datepublication:{
                  required:"Por favor, escriba la fecha a publicar.",
              },
					}
	});

	if (form.valid()) {

    var action=form.attr("data-action");
    var finale=sendformajax(action,"evento",form);

		switch (finale[0]){
				case true: redirectpage("eventos"); break;
				case false:
          switch(action){
            case "create":
              redirectpage("crear-evento");
            break;
            case "update":
              redirectpage("modificar-evento");
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
  $('#dateevent').daterangepicker({ format: "YYYY/MM/DD"});
  $( "form button" ).click(function() { events() });
});