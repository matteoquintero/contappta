function honor(){
	var form = $('#form-magazines');

	showerrors(form);
	form.validate({
					rules: {
              namemagazine:{
                   required:true,
                   maxlength:20
              },
              description:{
                   required:true
              }
					},
					messages: {
              namemagazine:{
                  required:"Por favor, escriba el nombre de la revista.",
                  maxlength:"El nombre de la revista no debe superar los 20 caractres.",
              },
              description:{
                  required:"Por favor, escriba la descripción.",
              }
					}
	});

	if (form.valid()) {

    var action=form.attr("data-action");
    var finale=sendformajax(action,"revista",form);
		switch (finale[0]){
				case true: redirectpage("revistas"); break;
				case false:
          switch(action){
            case "create":
              redirectpage("crear-revista");
            break;
            case "update":
              redirectpage("modificar-revista");
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
