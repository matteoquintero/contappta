<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjNoticiaReceptor=new NoticiaReceptor();
    $data["idReceptor"]=$_REQUEST["user"];
    $data["idNoticia"]=$_REQUEST["nevv"];
    $response=$ObjNoticiaReceptor->view($data);
    echo json_encode($response);
?>


