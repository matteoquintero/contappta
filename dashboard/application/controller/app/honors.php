<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjHonors=new Honors();
    $data["idUsuario"]=$_REQUEST["user"];
    $response=$ObjHonors->get("app",$data);
    echo json_encode($response);
?>


