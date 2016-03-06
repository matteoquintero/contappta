$.fn.toggleZindex= function() {
  var $this  = $(this);
    if($this.css("z-index")=="-99999"){
        $this.css("z-index","99999")
    }else{
        $this.css("z-index","-99999")
    }

  return this;
};
document.onkeydown = function(){
  switch (event.keyCode){
        case 116 : //F5 button
            event.returnValue = false;
            event.keyCode = 0;
            return false;
        case 82 : //R button
            if (event.ctrlKey){
                event.returnValue = false;
                event.keyCode = 0;
                return false;
            }
    }
}
function redirectpage(page,hash){

    var closepage = function() {
      jQuery("body").fadeOut(1000);
    };
    jQuery.when( closepage() ).done( function() {

        var user=sendajax("username","usuario");
        var to=(page=="mi-perfil") ? user : page;
        to=getroute()+to;

        if (hash !== "" && hash !== undefined && hash !== null) {
          if(location.pathname==to){
            window.location.hash=hash;
            window.location=to;
            location.reload();
          }else{
            window.location.replace(to+hash);
          }

        }else{
          if(location.pathname==to){
            window.location=to;
            location.reload();
          }else{
            window.location.replace(to);
          }
        }
    } );
}

function inarray(string, array){
    for (var i=0; i<array.length; i++){
        if ( array[i]=="" || array[i]==undefined || array[i]==null ) { }else{ if ( array[i].match(string)) { return true; } }
    }
    return false;
}

function ucwords(string){
 var arrayWords;
 var returnString = "";
 var len;
 arrayWords = string.split(" ");
 len = arrayWords.length;
 for(i=0;i < len ;i++){
  if(i != (len-1)){
   returnString = returnString+ucfirst(arrayWords[i])+" ";
  }
  else{
   returnString = returnString+ucfirst(arrayWords[i]);
  }
 }
 return returnString;
}

function ucfirst(string){
 return string.substr(0,1).toUpperCase()+string.substr(1,string.length).toLowerCase();
}

jQuery.fn.hasAttr = function(name) {
   return this.attr(name) !== undefined;
};

function getHash(name) {
   if (window.location.href.match(name)) {
	  if (window.location.hash) {
	    var hash = window.location.hash.substring(1);
      var hashdata=hash.split("#");
      var datareturn;
      var finale;
      for (var i = 0; i < hashdata.length; i++) {
        datareturn=hashdata[i];
        datareturn=datareturn.split("=");
        if (datareturn[0]==name) {finale=datareturn};
      }
      return finale;
	  } else { return false; }
  }else { return false; }
}

function linkto(){
  var to=getHash("to");
  if (to[0]=="to") { jQuery('#'+to[1]).scrollm(1800,150); }
}

function randomint(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function defaultclick () { return false; }

function sendformfileajax(accion,controller,form,inputfile){
    form.fadeOut();
    form.find(':input:disabled').removeAttr('disabled');

    var dataform = new FormData();

    var file_data = inputfile[0].files;
    for(var i = 0;i<file_data.length;i++){
        dataform.append("file-"+i, file_data[i]);
    }

    var other_data = form.serializeArray();
    $.each(other_data,function(key,input){
        dataform.append(input.name,input.value);
    });

    dataform.append("accion",accion);

    var modo=0;
    jQuery.ajax({
        url: getroutecontroller()+controller+".php",
        type: "POST",
        async:false,
        cache: false,
        dataType: "json",
        contentType: false,
        processData: false,
        data: dataform,
      error: function(jqXHR, textStatus, errorThrown) {
      },
    }).done(function( resultado ){ modo=resultado; });
    return modo;

}

function senddataajax(accion,controller,param){

    var data=(param!="") ? param+"&accion="+accion : "accion="+accion;
    var modo=0;
    jQuery.ajax({
        url: getroutecontroller()+controller+".php",
        type: "POST",
        dataType: "json",
        cache: false,
        async:false,
        data: data,
    }).done(function( resultado ){ modo=resultado; });
    return modo;
}

function sendajax(accion,controller){

    var modo=0;
    jQuery.ajax({
        url: getroutecontroller()+controller+".php",
        type: "POST",
        dataType: "json",
        cache: false,
        async:false,
        data: {accion:accion},
    }).done(function( resultado ){ modo=resultado; });
    return modo;
}

function sendformajax(accion,controller,form){

    form.fadeOut();
    form.find(':input:disabled').removeAttr('disabled');

    var dataform=(form) ? form.serialize()+"&accion="+accion : "accion="+accion;
    var modo=0;
    jQuery.ajax({
        url: getroutecontroller()+controller+".php",
        type: "POST",
        dataType: "json",
        cache: false,
        async:false,
        data: dataform,
 	    error: function(jqXHR, textStatus, errorThrown) {
	    },
    }).done(function( resultado ){ modo=resultado; });
    return modo;
}

function showinputerror (form,input,menssage) {
  var nameinput=jQuery(input).attr("name");
  jQuery(input).focus();
  jQuery(form).find("label[for='"+nameinput+"']").addClass("input-error");
  jQuery(form).find("label[for='"+nameinput+"'] span").remove();
  jQuery(form).find("label[for='"+nameinput+"']").append("<span>"+menssage+"</span>");
}

function hideinputerror (form,input){
  var nameinput=jQuery(input).attr("name");
  jQuery(form).find("label[for='"+nameinput+"']").removeClass("input-error");
  jQuery(form).find("label[for='"+nameinput+"'] span").remove();
}

function activateacount() {
  finale=sendajax("activateacount","usuario");
  switch (finale[0]){
    case true: redirectpage("mi-perfil","#message=30"); break;
    case false: redirectpage("mi-perfil","#message=0"); break;
  }
}

function lackuser(){ return sendajax("lack","usuario"); }
function user(idUsuario){ return senddataajax('data','usuario',"idUsuario="+idUsuario) }
function actionsuser(){ return sendajax("actions","productoxusuario"); }

function existemail(correo){
    return senddataajax("email","usuario","correo="+correo);
}

function oldpassword(password){
    return senddataajax("oldpassword","usuario","password="+password);
}

function existuser(usuario){
    return senddataajax("user","usuario","usuario="+usuario);
}
