<?php
    ini_set("session.cookie_lifetime","7200");
    ini_set("session.gc_maxlifetime","7200");
    session_start();
    //Este es el archvio encargado de procesar cada una de las paginas del proyecto
    require("application/requires.php");
    $Ruta="application/";
    IncluirArchivos($Ruta);
    $ObjUsuario=new Usuario();
    $ObjSesion=new Sesion();
    $ObjUtilidad=new Utilidad();
    $ObjInstitucion=new Institucion();
    $ObjGrupo=new Grupo();
    $ObjRol=new Rol();
    @$seccion=$_GET["seccion"];
    @$urldata=$_GET["data"];
    @$idUsuario=$_SESSION['usuario']["id"];
    //Paginas
    $page = array( "autenticacion","recordar-datos");

    $profile = array(
      "crear-institucion","instituciones","modificar-institucion",
      "crear-usuario","usuarios","modificar-usuario",
      "crear-noticia","noticias","modificar-noticia",
      "crear-grupo","grupos","modificar-grupo"
      );

    //Variable usuario logeado
    $usuariologeado=$ObjSesion->loggeduser();

    if ($usuariologeado) {

         $modo="all";
         $data["idUsuario"]=$idUsuario;
         $datausuario= $ObjUsuario->get($modo,$data);
         $smarty->assign("datausuario",$datausuario);
         $smarty->assign("usuariologeado",0);
         array_push($profile,$datausuario['usuario']);

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

        }

    }else if(in_array($seccion, $profile)){

        $smarty->assign("page",1);

        if ($usuariologeado) {

            switch ($seccion) {

            case "perfil":
                $user = $ObjInstitucion->get("one", $data);
                $smarty->assign("user",$user);
                $smarty->display($datausuario["permiso"]."/profile".MIN."html");
            break;

            case "instituciones":
                $institutions = $ObjInstitucion->get("all","");
                $smarty->assign("institutions",$institutions);
                $smarty->display($datausuario["permiso"]."/institutions".MIN."html");
            break;

            case "modificar-institucion":
                $data["idInstitucion"]=$_POST["idInstitucion"];
                $institution = $ObjInstitucion->get("one",$data);
                $smarty->assign("institution",$institution);
                $smarty->display($datausuario["permiso"]."/update-institution".MIN."html");
            break;

            case "crear-institucion":
                $smarty->display($datausuario["permiso"]."/create-institution".MIN."html");
            break;

            case "crear-usuario":
                $guardians = $ObjUsuario->get("guardian",$data);
                $smarty->assign("guardians",$guardians);
                $roles = $ObjRol->get("all","");
                $smarty->assign("roles",$roles);
                $groups = $ObjGrupo->get("all","");
                $smarty->assign("groups",$groups);
                $institutions = $ObjInstitucion->get("all","");
                $smarty->assign("institutions",$institutions);
                $smarty->display($datausuario["permiso"]."/create-user".MIN."html");
            break;

            case "usuarios":
                $users = $ObjUsuario->get("all","");
                $smarty->assign("users",$users);
                $smarty->display($datausuario["permiso"]."/users".MIN."html");
            break;

            case "modificar-usuario":
                $guardians = $ObjUsuario->get("guardian",$data);
                $smarty->assign("guardians",$guardians);
                $roles = $ObjRol->get("all","");
                $smarty->assign("roles",$roles);
                $groups = $ObjGrupo->get("all","");
                $smarty->assign("groups",$groups);
                $institutions = $ObjInstitucion->get("all","");
                $smarty->assign("institutions",$institutions);
                $data["idUsuario"]=$_POST["idUsuario"];
                $user = $ObjUsuario->get("one",$data);
                $smarty->assign("user",$user);
                $smarty->display($datausuario["permiso"]."/update-user".MIN."html");
            break;

            case "modificar-grupo":
                $institutions = $ObjInstitucion->get("all","");
                $smarty->assign("institutions",$institutions);
                $data["idGrupo"]=$_POST["idGrupo"];
                $group = $ObjGrupo->get("one",$data);
                $smarty->assign("group",$group);
                $smarty->display($datausuario["permiso"]."/update-group".MIN."html");
            break;

            case "crear-grupo":
                $institutions = $ObjInstitucion->get("all","");
                $smarty->assign("institutions",$institutions);
                $smarty->display($datausuario["permiso"]."/create-group".MIN."html");
            break;

            case "grupos":
                $groups = $ObjGrupo->get("all","");
                $smarty->assign("groups",$groups);
                $smarty->display($datausuario["permiso"]."/groups".MIN."html");
            break;

            case "crear-noticia":
                $data["idInstitucion"]=$_SESSION['usuario']["idInstitucion"];
                $data["idInstitucion"]=3;
                $users = $ObjUsuario->get("institution",$data);
                $smarty->assign("users",$users);
                $groups = $ObjGrupo->get("institution",$data);
                $smarty->assign("groups",$groups);
                $smarty->display($datausuario["permiso"]."/create-new".MIN."html");
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
