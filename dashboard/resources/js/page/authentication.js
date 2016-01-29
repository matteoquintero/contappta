jQuery(document).ready(function() {


  jQuery( "#contrasena" ).keypress(function(ev) { if(ev.keyCode == 13) { authentication(); return false;} });


});
function authentication(){
	var page=sendformajax('login','sesion',jQuery("#form-login"),"","");
	redirectpage(page[1],page[2]);
}
