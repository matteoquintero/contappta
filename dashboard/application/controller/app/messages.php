<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjMessages=new Messages();
    $data["idReceptor"]=$_REQUEST["reciver"];
    $data["idEmisor"]=$_REQUEST["transmitter"];
    $data["mode"]=$_REQUEST["mode"];
    $response=$ObjMessages->get("app",$data);
    echo json_encode($response);
?>


