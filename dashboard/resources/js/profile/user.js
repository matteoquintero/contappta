function user(){
	var form = jQuery('#form-user');
	showerrors(form);
	form.validate({
					rules: {
							user:{
									required:true,
                  uniqueuser:true
							},
						 name:{
						 			required:true,
							},
              lastname:{
                  required:true,
              },
              email:{
                  required:true,
                  email:true,
                  uniqueemail:true
              },
             password:{
                  required:true,
              },
              smartphone:{
                  required:true,
              },
             institution:{
                  required:true,
              },
              role:{
                  required:true,
              },
              guardian:{
                maxlength:4,
              }
					},
					messages: {
							user:{
									required:"Por favor, escriba el usuario.",
							},
              name:{
                  required:"Por favor, escriba el nombre.",
              },
              lastname:{
                  required:"Por favor, escriba el apellido.",
              },
              email:{
                  required:"Por favor, escriba el correo.",
                  email:"Correo electronico incorrecto."
              },
              password:{
                  required:"Por favor, escriba la contraseña.",
              },
              smartphone:{
                  required:"Por favor, escriba el celular.",
              },
              institution:{
                  required:"Por favor, seleccione la institución.",
              },
              role:{
                  required:"Por favor, seleccione el rol",
              },
              guardian:{
                  maxlength:"Por favor, seleccione maximo 4 acudientes",
              },
					}
	});

	if (form.valid()) {

      var action=form.attr("data-action");
	    var finale=sendformajax(action,"usuario",form,"","json");

			switch (finale[0]){
				case true: redirectpage("usuarios"); break;
				case false:
          switch(action){
            case "create":
              redirectpage("crear-usuario");
            break;
            case "update":
              redirectpage("modificar-usuario");
            break;
          }
        break;
			}

	}else{return false;}
	return false;
}


$(document).ready(function() {
  $(".select2").select2();
  $( "form button" ).click(function() { user() });
});
