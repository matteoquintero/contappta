<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjRespuesta=new Respuesta();
    $data["idUsuario"]=$_REQUEST["user"];
    $data["idNoticia"]=$_REQUEST["nevv"];
    $data["respuesta"]=$_REQUEST["response"];
    $response=$ObjRespuesta->create($data);
    echo json_encode($response);
?>
