<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjMensaje=new Mensaje();
    $ObjNotificacionReceptor=new NotificacionReceptor();
    switch ($_REQUEST["mode"]) {
      case "view":
        $data["idReceptor"]=$_REQUEST["reciver"];
        $data["idConversacion"]=$_REQUEST["conversation"];
        $ObjNotificacionReceptor->viewmessages($data);
        $response=$ObjMensaje->view($data);
      break;

      case "remove":
        $data["idConversacion"]=$_REQUEST["conversation"];
        $response=$ObjMensaje->delete($data);
      break;

    }
    if ($response=="") {$response[0]->data=false; }
    echo json_encode($response);
?>


