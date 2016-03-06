function username(){
	var form = $('#form-private');

	showerrors(form);
	form.validate({
					rules: {
              username:{
                   required:true,
                   uniqueuser:true
              }
					},
					messages: {
              username:{
                required:"Por favor, escriba el usuario.",
              }

					}
	});

	if (form.valid()) {

    var action=form.attr("data-action");
    var finale=sendformajax(action,"usuario",form);
		switch (finale[0]){
				case true: redirectpage("mi-perfil"); break;
				case false: redirectpage("modificar-usuario"); break;
		}

	}else{return false;}
	return false;
}


$(document).ready(function() {
  $( "form button" ).click(function() { username() });
});
