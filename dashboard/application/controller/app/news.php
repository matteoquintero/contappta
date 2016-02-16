<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjNews=new News();
    $data["idReceptor"]=$_REQUEST["reciver"];
    $data["idNoticia"]=$_REQUEST["nevv"];
    $data["mode"]=$_REQUEST["mode"];
    $response=$ObjNews->get("app",$data);
    echo json_encode($response);
?>


