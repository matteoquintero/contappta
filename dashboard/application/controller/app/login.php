<?php
  header('Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, x-requested-with, Content-Type, Content-Range, Content-Disposition, Content-Description');
  header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
  header('Access-Control-Allow-Origin: *');
  require("../../requires.php");
  $Ruta="../../";
  IncluirArchivos($Ruta);
  $ObjUsers=new Users();
  $ObjSesion=new Sesion();
  $ObjCifrado=new Cifrado();
  $user=strtolower($_REQUEST["user"]);
  $password=$ObjCifrado->encryptpassword($_REQUEST["password"]);
  $data["usuario"]=$user;
  $mode="app-sesion";
  $datauser=$ObjUsers->get($mode,$data);
  $datauser["deviceToken"]=$_REQUEST["devicetoken"];
  $response=$ObjSesion->authenticationapp($user,$password,$datauser);
  $response[1]=$datauser;
  echo json_encode($response);
?>


