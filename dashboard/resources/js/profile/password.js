function password(){
	var form = $('#form-private');
	showerrors(form);
	form.validate({
					rules: {
              oldpassword:{
                   required:true,
                   oldpassword:true,
              },
              password:{
                   required:true
              },
              repeatpassword:{
                  required:true,
                  equalTo: "#password"
              }
					},
					messages: {
              oldpassword:{
                required:"Por favor, escriba la contraseña antigua.",
              },
              password:{
                required:"Por favor, escriba la contraseña nueva.",

              },
              repeatpassword:{
                required:"Por favor, escriba de nuevo contraseña.",
                equalTo:"Las contraseñas no coiciden",
              }
					}
	});

	if (form.valid()) {

    var action=form.attr("data-action");
    var finale=sendformajax(action,"usuario",form);
		switch (finale[0]){
				case true: redirectpage("mi-perfil"); break;
				case false: redirectpage("modificar-contrasena"); break;
		}

	}else{return false;}
	return false;
}


$(document).ready(function() {
  $( "form button" ).click(function() { password() });
});
