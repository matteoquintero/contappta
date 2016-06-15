<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjUsers=new Users();
    $ObjNotificacionReceptor=new NotificacionReceptor();
    $ObjReconocimientoUsuario=new ReconocimientoUsuario();

    switch ($_REQUEST["mode"]) {

      case 'user':
        $data["idUsuario"]=$_REQUEST["user"];
        $response=$ObjUsers->get("app",$data);
      break;

      case 'users':
        $data["idInstitucion"]=$_REQUEST["institution"];
        $data["idUsuario"]=$_REQUEST["user"];
        $response=$ObjUsers->get("users-chats",$data);
      break;

      case 'view':


        $data["idHijo"]=$_REQUEST["son"];
        $recousers=$ObjReconocimientoUsuario->get("notification",$data);

        foreach ($recousers as $recouser) {

          $data["idReceptor"]=$_REQUEST["parent"];
          $data["idTipo"]=$recouser->idReconocimientoUsuario;
          $ObjNotificacionReceptor->view($data);

        }

      break;

    }
    if ($response=="") {$response=false; }
    echo json_encode($response);
?>


