<?php
    header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Origin: *');
    require("../../requires.php");
    $Ruta="../../";
    IncluirArchivos($Ruta);

    $ObjUsuario=new Usuario();
    $ObjCifrado=new Cifrado();

    $data["idUsuario"]=$_REQUEST['user'];
    $data["nombre"]=$_REQUEST['name'];
    $data["apellido"]=$_REQUEST['lastmane'];
    $data["correo"]=$_REQUEST['email'];
    $data["contrasena"]=$ObjCifrado->encryptpassword( $_REQUEST["password"] );

    $user=$ObjUsuario->update($data);
   echo json_encode($user);

?>


