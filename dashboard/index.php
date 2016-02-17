<?php
    ini_set("session.cookie_lifetime","7200");
    ini_set("session.gc_maxlifetime","7200");
    session_start();

    //Este es el archvio encargado de procesar cada una de las paginas del proyecto
    require("application/requires.php");
    $Ruta="application/";
    IncluirArchivos($Ruta);
    $ObjSesion=new Sesion();
    $ObjUtilidad=new Utilidad();
    $ObjGrupo=new Grupo();
    $ObjRol=new Rol();
    $ObjCifrado=new Cifrado();
    $ObjNews=new News();
    $ObjSendersNews=new SendersNews();
    $ObjAnswersNews=new AnswersNews();
    $ObjUsers=new Users();
    $ObjEvents=new Events();
    $ObjSendersEvents=new SendersEvents();
    $ObjMessages=new Messages();
    $ObjSendersMessages=new SendersMessages();
    $ObjPlantilla=new Plantilla();
    $ObjHonors=new Honors();
    $ObjInstitutions=new Institutions();
    $ObjTipoReconocimiento=new TipoReconocimiento();
    $ObjTipoInstitucion=new TipoInstitucion();
    $ObjRevista=new Revista();

    @$seccion=$_GET["seccion"];
    @$urldata=$_GET["data"];
    @$idUsuario=$_SESSION['usuario']["idUsuario"];
    //Paginas
    $page = array( "autenticacion","recordar-datos","cerrar-sesion");

    $profile = array(
      "crear-institucion","instituciones","modificar-institucion",
      "crear-usuario","usuarios","modificar-usuario","acudientes-usuario",
      "crear-noticia","noticias","modificar-noticia","receptores-noticia","respuestas-noticia",
      "crear-mensaje","mensajes","modificar-mensaje","receptores-mensaje",
      "crear-evento","eventos","modificar-evento","receptores-evento",
      "crear-grupo","grupos","modificar-grupo",
      "crear-reconocimiento","reconocimientos","modificar-reconocimiento",
      "crear-revista","revistas","modificar-revista",
      "perfil"
      );

    //Variable usuario logeado
    $usuariologeado=$ObjSesion->loggeduser();

    if ($usuariologeado) {

         $modo="one";
         $data["idUsuario"]=$idUsuario;
         $userdata= $ObjUsers->get($modo,$data);
         $smarty->assign("userdata",$userdata);
         $smarty->assign("usuariologeado",0);
         array_push($profile,$userdata['usuario']);

     }else{$smarty->assign("usuariologeado",1);}

    //Atributos del head de cada pagina
    $datasection=$ObjUtilidad->datasection($seccion);
    $smarty->assign("datasection",$datasection);

    if (in_array($seccion, $page)) {

        $smarty->assign("page",0);

        switch ($seccion) {

            case "recordar-datos":
              $smarty->display("page/remember".MIN."html");
            break;

            case "autenticacion":
              $smarty->display("page/authentication".MIN."html");
            break;

            case "cerrar-sesion":
              $ObjSesion->unlogin();
            break;

        }

    }else if(in_array($seccion, $profile)){

        $smarty->assign("page",1);

        if ($usuariologeado) {

            switch ($seccion) {

            case $userdata["usuario"]:

                $guardians = $ObjUsers->get("guardian",$data);
                $smarty->assign("guardians",$guardians);

                $roles = $ObjRol->get("all","");
                $smarty->assign("roles",$roles);

                $data["idInstitucion"]=$userdata["idInstitucion"];
                $groups = $ObjGrupo->get("institution",$data);
                $smarty->assign("groups",$groups);

                $smarty->display($userdata["permiso"]."/profile".MIN."html");

            break;

            case "instituciones":

                $institutions = $ObjInstitutions->get("all","");
                $smarty->assign("institutions",$institutions);

                $smarty->display($userdata["permiso"]."/institutions".MIN."html");

            break;

            case "modificar-institucion":

                $data["idInstitucion"]=$_POST["idInstitucion"];
                $institution = $ObjInstitutions->get("one",$data);
                $smarty->assign("institution",$institution);

                $smarty->display($userdata["permiso"]."/update-institution".MIN."html");

            break;

            case "crear-institucion":

                $typesInstitutions = $ObjTipoInstitucion->get("all","");
                $smarty->assign("typesInstitutions",$typesInstitutions);

                $smarty->display($userdata["permiso"]."/create-institution".MIN."html");

            break;

            case "crear-usuario":

                $data["idInstitucion"]=$userdata["idInstitucion"];

                $guardians = $ObjUsers->get("guardian",$data);
                $smarty->assign("guardians",$guardians);

                $honors = $ObjHonors->get("institution",$data);
                $smarty->assign("honors",$honors);

                $groups = $ObjGrupo->get("institution",$data);
                $smarty->assign("groups",$groups);

                $roles = $ObjRol->get("all","");
                $smarty->assign("roles",$roles);

                $smarty->display($userdata["permiso"]."/create-user".MIN."html");

            break;

            case "acudientes-usuario":

                $data["idHijo"]=$_POST["idUsuario"];
                $users = $ObjUsers->get("guardiansson",$data);
                $smarty->assign("users",$users);



                $smarty->display($userdata["permiso"]."/guardians-user".MIN."html");

            break;

            case "usuarios":

                $data["idInstitucion"]=$userdata["idInstitucion"];

                $users = $ObjUsers->get("institution",$data);
                $smarty->assign("users",$users);

                $smarty->display($userdata["permiso"]."/users".MIN."html");

            break;

            case "modificar-usuario":

                $data["idInstitucion"]=$userdata["idInstitucion"];

                $guardians = $ObjUsers->get("guardian",$data);
                $smarty->assign("guardians",$guardians);

                $groups = $ObjGrupo->get("institution",$data);
                $smarty->assign("groups",$groups);

                $honors = $ObjHonors->get("institution",$data);
                $smarty->assign("honors",$honors);

                $roles = $ObjRol->get("all","");
                $smarty->assign("roles",$roles);

                $data["idUsuario"]=$_POST["idUsuario"];
                $user = $ObjUsers->get("one",$data);
                $smarty->assign("user",$user);

                $smarty->display($userdata["permiso"]."/update-user".MIN."html");

            break;

            case "modificar-grupo":

                $data["idGrupo"]=$_POST["idGrupo"];
                $group = $ObjGrupo->get("one",$data);
                $smarty->assign("group",$group);

                $smarty->display($userdata["permiso"]."/update-group".MIN."html");

            break;

            case "crear-grupo":

                $smarty->display($userdata["permiso"]."/create-group".MIN."html");

            break;

            case "grupos":

                $data["idInstitucion"]=$userdata["idInstitucion"];
                $groups = $ObjGrupo->get("institution",$data);
                $smarty->assign("groups",$groups);

                $smarty->display($userdata["permiso"]."/groups".MIN."html");

            break;

            case "crear-noticia":

                $data["idInstitucion"]=$userdata["idInstitucion"];
                $users = $ObjUsers->get("institution",$data);
                $smarty->assign("users",$users);

                $groups = $ObjGrupo->get("institution",$data);
                $smarty->assign("groups",$groups);

                $templates = $ObjPlantilla->get("all","");
                $smarty->assign("templates",$templates);

                $smarty->display($userdata["permiso"]."/create-new".MIN."html");
            break;

            case "noticias":

                $news = $ObjNews->get("all","");
                $smarty->assign("news",$news);

                $smarty->display($userdata["permiso"]."/news".MIN."html");

            break;

            case "modificar-noticia":

                $data["idNoticia"]=$_POST["idNoticia"];
                $new = $ObjNews->get("one",$data);
                $smarty->assign("new",$new);

                $smarty->display($userdata["permiso"]."/update-new".MIN."html");

            break;

            case "receptores-noticia":

                $data["idNoticia"]=$_POST["idNoticia"];
                $sendersnews = $ObjSendersNews->get("new",$data);
                $smarty->assign("sendersnews",$sendersnews);

                $smarty->display($userdata["permiso"]."/senders-news".MIN."html");

            break;

            case "respuestas-noticia":

                $data["idNoticia"]=$_POST["idNoticia"];
                $answersnews = $ObjAnswersNews->get("new",$data);
                $smarty->assign("answersnews",$answersnews);

                $smarty->display($userdata["permiso"]."/answers-news".MIN."html");

            break;

            case "crear-mensaje":

                $data["idInstitucion"]=$userdata["idInstitucion"];
                $users = $ObjUsers->get("institution",$data);
                $smarty->assign("users",$users);

                $groups = $ObjGrupo->get("institution",$data);
                $smarty->assign("groups",$groups);

                $smarty->display($userdata["permiso"]."/create-message".MIN."html");
            break;

            case "mensajes":

                $messages = $ObjMessages->get("all","");
                $smarty->assign("messages",$messages);

                $smarty->display($userdata["permiso"]."/messages".MIN."html");

            break;

            case "modificar-mensaje":

                $data["idMensaje"]=$_POST["idMensaje"];
                $message = $ObjMessages->get("one",$data);
                $smarty->assign("message",$message);
                $smarty->display($userdata["permiso"]."/update-message".MIN."html");

            break;

            case "receptores-mensaje":

                $data["idMensaje"]=$_POST["idMensaje"];
                $sendersmessages = $ObjSendersMessages->get("message",$data);
                $smarty->assign("sendersmessages",$sendersmessages);

                $smarty->display($userdata["permiso"]."/senders-messages".MIN."html");

            break;

            case "crear-evento":

                $data["idInstitucion"]=$userdata["idInstitucion"];
                $users = $ObjUsers->get("institution",$data);
                $smarty->assign("users",$users);

                $groups = $ObjGrupo->get("institution",$data);
                $smarty->assign("groups",$groups);

                $smarty->display($userdata["permiso"]."/create-event".MIN."html");
            break;

            case "eventos":

                $events = $ObjEvents->get("all","");
                $smarty->assign("events",$events);

                $smarty->display($userdata["permiso"]."/events".MIN."html");

            break;

            case "modificar-evento":

                $data["idEvento"]=$_POST["idEvento"];
                $event = $ObjEvents->get("one",$data);
                $smarty->assign("event",$event);

                $smarty->display($userdata["permiso"]."/update-event".MIN."html");

            break;

            case "receptores-evento":

                $data["idEvento"]=$_POST["idEvento"];
                $sendersevents = $ObjSendersEvents->get("event",$data);
                $smarty->assign("sendersevents",$sendersevents);

                $smarty->display($userdata["permiso"]."/senders-events".MIN."html");

            break;

            case "crear-reconocimiento":

                $typesHonors = $ObjTipoReconocimiento->get("all","");
                $smarty->assign("typesHonors",$typesHonors);

                $smarty->display($userdata["permiso"]."/create-honor".MIN."html");

            break;

            case "reconocimientos":

                $data["idInstitucion"]=$userdata["idInstitucion"];

                $honors = $ObjHonors->get("institution",$data);
                $smarty->assign("honors",$honors);

                $smarty->display($userdata["permiso"]."/honors".MIN."html");

            break;

            case "modificar-reconocimiento":

                $data["idReconocimiento"]=$_POST["idReconocimiento"];
                $honor = $ObjHonors->get("one",$data);
                $smarty->assign("honor",$honor);

                $typesHonors = $ObjTipoReconocimiento->get("all","");
                $smarty->assign("typesHonors",$typesHonors);

                $smarty->display($userdata["permiso"]."/update-honor".MIN."html");

            break;


            case "crear-revista":

                $smarty->display($userdata["permiso"]."/create-magazine".MIN."html");

            break;

            case "revistas":

                $data["idInstitucion"]=$userdata["idInstitucion"];

                $magazines = $ObjRevista->get("institution",$data);
                $smarty->assign("magazines",$magazines);

                $smarty->display($userdata["permiso"]."/magazines".MIN."html");

            break;

            case "modificar-revista":

                $data["idRevista"]=$_POST["idRevista"];
                $magazine = $ObjRevista->get("one",$data);
                $smarty->assign("magazine",$magazine);

                $smarty->display($userdata["permiso"]."/update-magazine".MIN."html");

            break;

            }

        }else{ header("Location:".BASE."autenticacion"); }

    }else{
    	if ($seccion=="") {
    		    $smarty->assign("page",2);
           	$smarty->display("page/authentication".MIN."html");
    	}else{
           	$smarty->display("errorpage/404".MIN."html");
    	}
    }

?>
