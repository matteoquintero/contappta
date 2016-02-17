function honor(){
	var form = $('#form-honors');

	showerrors(form);
	form.validate({
					rules: {
              namehonor:{
                   required:true,
                   maxlength:20
              },
              typeHonor:{
                   required:true
              },
              description:{
                   required:true
              }
					},
					messages: {
              namehonor:{
                  required:"Por favor, escriba el nombre del reconocimiento.",
                  maxlength:"El nombre reconocimiento no debe superar los 20 caractres.",
              },
              typeHonor:{
                  required:"Por favor, seleccione el tipo de reconocimiento.",
              },
              description:{
                  required:"Por favor, escriba la descripción.",
              }
					}
	});

	if (form.valid()) {

    var action=form.attr("data-action");
    var finale=sendformajax(action,"reconocimiento",form);
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
  $(".select2").select2();
  $( "form button" ).click(function() { honor() });
});
