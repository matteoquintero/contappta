function group(){
	var form = jQuery('#form-group');
	showerrors(form);
	form.validate({
					rules: {
             institution:{
                  required:true,
              },
							degree:{
									required:true,
							},
						 id:{
						 			required:true,
							},

					},
					messages: {
              institution:{
                  required:"Por favor, seleccione la institución.",
              },
							degree:{
									required:"Por favor, escriba el grado.",
							},
              id:{
                  required:"Por favor, escriba el identificador.",
              },

					}
	});

	if (form.valid()) {

      var action=form.attr("data-action");
	    var finale=sendformajax(action,"grupo",form,"","json");
			switch (finale[0]){
				case true: redirectpage("grupos"); break;
				case false:
          switch(action){
            case "create":
              redirectpage("crear-grupo");
            break;
            case "update":
              redirectpage("modificar-grupo");
            break;
          }
        break;
			}

	}else{return false;}
	return false;
}


$(document).ready(function() {

  $(".select2").select2({ placeholder: "Selecciona", allowClear: true});
  jQuery( "form button" ).click(function() { group() });

});
