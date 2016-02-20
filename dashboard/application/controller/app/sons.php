<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjUsers=new Users();
    $data["idAcudiente"]=$_REQUEST["user"];
    $response=$ObjUsers->get("app-son",$data);
    echo json_encode($response);
?>


