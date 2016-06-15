<?php

    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjUtilidad=new Utilidad();
    $ObjMensaje=new Mensaje();
    $ObjPhone=new Phone();
    $ObjNotificacion=new Notificacion();
    $ObjNotificacionReceptor=new NotificacionReceptor();

    $consecutivo=$ObjMensaje->getconsecutive();
    $identificador=chr(rand(ord("A"), ord("Z"))).rand(0,9).chr(rand(ord("A"), ord("Z"))).$consecutivo;

    if ($_POST["photo"]=="Si") {
      $ruta="../../../_data/messages/";
      $nombre=$identificador;
      $nombrefile="file";
      $foto=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
      $datamessage["media"]=$foto[1];
    }

    $datamessage["idNotificacion"]=$notification[1];
    $datamessage["idEmisor"]=$_POST["transmitter"];
    $datamessage["idInstitucion"]=$_POST["institution"];
    $datamessage["mensaje"]=$_POST["message"];
    $datamessage["idReceptor"]=$_POST["reciver"];
    $datamessage["idConversacion"]=$_POST["conversation"];
    $datamessage["consecutivo"]=$consecutivo;

    $response=$ObjMensaje->create($datamessage);

    $datanotification["idInstitucion"]=$_POST["institution"];
    $datanotification["idEmisor"]=$_POST["transmitter"];
    $datanotification["asunto"]="Mensaje nuevo";
    $datanotification["descripcion"]=substr($_POST["message"], 0,20);
    $datanotification["enlaceApp"]="tab.chats";
    $datanotification["enlaceDashboard"]="mensajes";
    $datanotification["publicadaDashboard"]="Si";
    $datanotification["publicadaApp"]="Si";

    $notification=$ObjNotificacion->create($datanotification);

    $data["idTipo"]=$response[1];
    $data["idReceptor"]=$_POST["reciver"];
    $data["idNotificacion"]=$notification[1];
    $data["tipo"]="message";
    $data["idConversacion"]=$_POST["conversation"];

    $ObjNotificacionReceptor->create($data);

    $dataphone["page"]="mensajes";
    $ObjPhone->sendnotifications($notification[1],$dataphone);

    echo json_encode($response);


?>
