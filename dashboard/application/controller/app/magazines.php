<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjMagazines=new Magazines();
    $ObjPagina=new Pagina();
    $ObjNotificacionReceptor=new NotificacionReceptor();
    switch ($_REQUEST["mode"]) {

      case 'magazines':
        $data["idInstitucion"]=$_REQUEST["institution"];
        $response=$ObjMagazines->get("institution",$data);
      break;

      case 'pages':
        $data["idRevista"]=$_REQUEST["magazine"];
        $response=$ObjPagina->get("magazine",$data);
      break;

      case 'view':

        $data["idReceptor"]=$_REQUEST["user"];
        $data["idTipo"]=$_REQUEST["magazine"];
        $ObjNotificacionReceptor->view($data);

      break;

    }
    if ($response=="") {$response[0]->data=false; }
    echo json_encode($response);
?>


