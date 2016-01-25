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
    @$seccion=$_GET["seccion"];
    @$urldata=$_GET["data"];
    $idUsuario=$_SESSION['usuario']["id"];
    //Paginas
    $page = array("crear-institucion","instituciones","modificar-institucion","soluciones","crear-cuenta","que-es");
    $profile = array(
      "crear-institucion","transaccion","mi-empresa",
      "casos-laborales","cerrar-sesion","membresia");

    //Variable usuario logeado
    $usuariologeado=$ObjSesion->UsuarioLogeado();

    if ($usuariologeado) {

         $modo="all";
         $data["usuario"]=$_SESSION['usuario']["usuario"];
         $datausuario= $ObjUsuario->get($modo,$data);
         $smarty->assign("datausuario",$datausuario);
         $smarty->assign("usuariologeado",0);
         array_push($profile,$_SESSION['usuario']["usuario"]);

     }else{$smarty->assign("usuariologeado",1);}

    //Atributos del head de cada pagina
    $datasection=$ObjUtilidad->datasection($seccion);
    $smarty->assign("datasection",$datasection);

    if (in_array($seccion, $page)) {

        $smarty->assign("page",0);

        switch ($seccion) {

            case "instituciones":
                $institutes = $ObjInstitucion->get("all","");
                $smarty->assign("institutes",$institutes);
                $smarty->display("user/institutes".MIN."html");
            break;

            case "modificar-institucion":
                $data["idInstitucion"]=$_POST["idInstitucion"];
                $institute = $ObjInstitucion->get("one",$data);
                $smarty->assign("institute",$institute);
                $smarty->display("user/update-institute".MIN."html");
            break;

            case "crear-institucion":
                $smarty->display("user/create-institute".MIN."html");
            break;

            case "crear-usuario":
                $smarty->display("user/create-user".MIN."html");
            break;
        }

    }else if(in_array($seccion, $profile)){

        $smarty->assign("page",1);

        if ($usuariologeado) {

            switch ($seccion) {

                case "reports":
                    $smarty->display("administrator/reports".MIN."html");
                break;

                case "categories":
                    $categories = $ObjCategoria->get("","");
                    $smarty->assign("categories",$categories);
                    $smarty->display("administrator/categories".MIN."html");
                break;

            }

        }else{ header("Location:".BASE."autenticacion"); }

    }else{
    	if ($seccion=="") {
    		    $smarty->assign("page",2);
           	$smarty->display("page/home".MIN."html");
    	}else{
           	$smarty->display("errorpage/404".MIN."html");
    	}
    }

?>
