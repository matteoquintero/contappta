$(document).ready(function() {

  $( "#contrasena" ).keypress(function(ev) { if(ev.keyCode == 13) { authentication(); } });
  $( "#form-authentication button" ).click(function() { authentication(); });

});
function authentication(){
	var page=sendformajax('login','sesion',$("#form-authentication"),"","");
	redirectpage(page[1],page[2]);
}
