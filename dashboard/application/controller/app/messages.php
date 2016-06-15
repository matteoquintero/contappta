<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);
    $ObjMessages=new Messages();
    $data["idConversacion"]=$_REQUEST["conversation"];
    $mode=$_REQUEST["mode"];
    $response=$ObjMessages->get($mode,$data);
    if ($response=="") {$response[0]->data=false; }
    echo json_encode($response);
?>


