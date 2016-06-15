<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjNotificacionReceptor=new NotificacionReceptor();
    $user=$_REQUEST["user"];

    $response["news"]=$ObjNotificacionReceptor->getnews($user);
    $response["messages"]=$ObjNotificacionReceptor->getmessages($user);
    $response["events"]=$ObjNotificacionReceptor->getevents($user);
    $response["magazines"]=$ObjNotificacionReceptor->getmagazines($user);
    $response["recognitions"]=$ObjNotificacionReceptor->getrecognitions($user);
    $response["acount"]=$response["events"]+$response["magazines"]+$response["recognitions"];

    echo json_encode($response);
?>


