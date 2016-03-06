function importusers(){
  var form = $('#form-import-users');
	showerrors(form);
	form.validate({
					rules: {
             users:{
                  required:true,
              }
					},
					messages: {
              users:{
                  required:"Por favor, seleccione el archivo.",
              }

					}
	});

	if (form.valid()) {

    form.submit();

	}else{return false;}
	return false;
}


$(document).ready(function() {

  $( "#import" ).click(function() { importusers() });
  $( "#download" ).click(function() { $("#form-download").submit(); });

});
