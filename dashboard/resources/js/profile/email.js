function email(){
	var form = $('#form-private');

	showerrors(form);
	form.validate({
					rules: {
              email:{
                   required:true,
                   uniqueemail:true
              }
					},
					messages: {
              email:{
                required:"Por favor, escriba el correo.",
              }

					}
	});

	if (form.valid()) {

    var action=form.attr("data-action");
    var finale=sendformajax(action,"usuario",form);
		switch (finale[0]){
				case true: redirectpage("mi-perfil"); break;
				case false: redirectpage("modificar-correo"); break;
		}
	}else{return false;}
	return false;
}


$(document).ready(function() {
  $( "form button" ).click(function() { email() });
});
