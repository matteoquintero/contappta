<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
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


