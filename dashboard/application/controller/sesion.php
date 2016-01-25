<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjUsuario=new Usuario();
    $ObjSesion=new Sesion();
    $ObjCifrado=new Cifrado();
    @$AccionPost=$_POST["accion"];

        if (isset($AccionPost)) {

            switch ($AccionPost) {

                case "login":
                    $user=strtolower($_POST["usuario"]);
                    $password=$ObjCifrado->encryptpassword($_POST["contrasena"]);
                    $data["usuario"]=$user;
                    $mode="sesion";
                    $datauser=$ObjUsuario->get($mode,$data);
                    $mode="C247";
                    $response=$ObjSesion->Autenticacion($user,$password,$datauser,$mode);
										echo json_encode($response);
                break;

                case "unlogin":
                	$ObjSesion->CerrarSesion();
                break;

            }

        }else{echo json_encode($respuesta);}
?>
