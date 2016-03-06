<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
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


