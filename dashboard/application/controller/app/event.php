<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjEventoReceptor=new EventoReceptor();
    $ObjNotificacionReceptor=new NotificacionReceptor();
    $data["idReceptor"]=$_REQUEST["user"];
    $data["idEvento"]=$_REQUEST["even"];
    $data["idTipo"]=$_REQUEST["even"];
    $ObjNotificacionReceptor->view($data);
    $ObjEventoReceptor->view($data);
?>


