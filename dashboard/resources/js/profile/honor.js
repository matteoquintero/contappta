function honor(){
	var form = $('#form-honors');
  var inputfile = $('#logo');

	showerrors(form);
	form.validate({
					rules: {
              typeHonor:{
                   required:true
              },
              honor:{
                   required:true
              },
              description:{
                   required:true
              }
					},
					messages: {
              typeHonor:{
                  required:"Por favor, seleccione el tipo de reconocimiento.",
              },
              honor:{
                  required:"Por favor, escriba el reconocimiento.",
              },
              description:{
                  required:"Por favor, escriba la descripción.",
              }
					}
	});

	if (form.valid()) {

    var action=form.attr("data-action");
    var finale=sendformfileajax(action,"reconocimiento",form,inputfile);
		switch (finale[0]){
				case true: redirectpage("reconocimientos"); break;
				case false:
          switch(action){
            case "create":
              redirectpage("crear-reconocimiento");
            break;
            case "update":
              redirectpage("modificar-reconocimiento");
            break;
          }
        break;
			}

	}else{return false;}
	return false;
}


$(document).ready(function() {
  $( "form button" ).click(function() { honor() });
});
