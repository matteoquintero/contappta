<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjInstitutions=new Institutions();
    $data["idInstitucion"]=$_REQUEST["institution"];
    $response=$ObjInstitutions->get("app",$data);
    if ($response=="") {$response[0]->data=false; }
    echo json_encode($response);
?>


