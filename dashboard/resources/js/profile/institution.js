function institution(){
	var form = jQuery('#form-institution');
  var inputfile = $('#logo');

	showerrors(form);
	form.validate({
					rules: {
							name:{
									required:true,
							},
						 email:{
						 			required:true,
                  email:true
							},
              address:{
                  required:true,
              },
					},
					messages: {
							name:{
									required:"Por favor, escriba el nombre.",
							},
              email:{
                  required:"Por favor, escriba el correo.",
                  email:"Correo electronico incorrecto."
              },
              address:{
                  required:"Por favor, escriba la dirección.",
              },
					}
	});

	if (form.valid()) {

      var action=form.attr("data-action");
      var finale=sendformfileajax(action,"institucion",form,inputfile);

		  switch (finale[0]){
				case true: redirectpage("instituciones"); break;
				case false:
          switch(action){
            case "create":
              redirectpage("crear-institucion");
            break;
            case "update":
              redirectpage("modificar-institucion");
            break;
          }
        break;
			}

	}else{return false;}
	return false;
}


$(document).ready(function() {

  $(".select2").select2();
  $( "form button" ).click(function() { institution() });

});
