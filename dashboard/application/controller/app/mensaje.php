<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjMensaje=new Mensaje();
    switch ($_REQUEST["mode"]) {
      case 'create':
        $data["idEmisor"]=$_REQUEST["transmitter"];
        $data["idInstitucion"]=$_REQUEST["institution"];
        $data["mensaje"]=$_REQUEST["message"];
        $data["idReceptor"]=$_REQUEST["reciver"];
        $data["idConversacion"]=$_REQUEST["conversation"];
        $response=$ObjMensaje->create($data);
        echo json_encode($response);
      break;

      case "view":
        $data["idReceptor"]=$_REQUEST["reciver"];
        $data["idConversacion"]=$_REQUEST["conversation"];
        $response=$ObjMensaje->view($data);
        echo json_encode($response);
      break;

      case "remove":
        $data["idConversacion"]=$_REQUEST["conversation"];
        $response=$ObjMensaje->delete($data);
        echo json_encode($response);
      break;

    }

?>


