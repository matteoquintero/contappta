<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjChats=new Chats();
    $data["idUsuario"]=$_REQUEST["user"];
    $mode=$_REQUEST["mode"];
    $response=$ObjChats->get($mode,$data);
    echo json_encode($response);
?>


