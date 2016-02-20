<?php
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
  require("../../requires.php");
  $Ruta="../../";
  IncluirArchivos($Ruta);
  $ObjUsers=new Users();
  $ObjSesion=new Sesion();
  $ObjInstitutions=new Institutions();
  $ObjCifrado=new Cifrado();
  $user=strtolower($_REQUEST["user"]);
  $password=$ObjCifrado->encryptpassword($_REQUEST["password"]);
  $data["usuario"]=$user;
  $mode="app-sesion";
  $datauser=$ObjUsers->get($mode,$data);
  $mode="app";
  $institution=$ObjInstitutions->get($mode,$datauser);
  $response=$ObjSesion->authenticationapp($user,$password,$datauser);
  $response[1]=$datauser;
  $response[2]=$institution;
  echo json_encode($response);
?>


