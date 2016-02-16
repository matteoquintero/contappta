<?php
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
  require("../../requires.php");
  $Ruta="../../";
  IncluirArchivos($Ruta);
  $ObjUsers=new Users();
  $ObjSesion=new Sesion();
  $ObjCifrado=new Cifrado();
  $user=strtolower($_REQUEST["user"]);
  $password=$ObjCifrado->encryptpassword($_REQUEST["password"]);
  $data["usuario"]=$user;
  $mode="sesion";
  $datauser=$ObjUsers->get($mode,$data);
  $response=$ObjSesion->authentication($user,$password,$datauser);
  echo json_encode($response);
?>


