<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjEvents=new Events();
    $data["idReceptor"]=$_REQUEST["reciver"];
    $data["idEvento"]=$_REQUEST["even"];
    $data["fechaInicio"]=$_REQUEST["dateevent"];
    $mode=$_REQUEST["mode"];
    $response=$ObjEvents->get($mode,$data);
    echo json_encode($response);
?>


