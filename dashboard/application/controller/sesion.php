<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjUsuario=new Usuario();
    $ObjSesion=new Sesion();
    $ObjCifrado=new Cifrado();
    @$action=$_POST["accion"];

        if (isset($action)) {

            switch ($action) {

                case "login":
                    $user=strtolower($_POST["user"]);
                    $password=$ObjCifrado->encryptpassword($_POST["password"]);
                    $data["usuario"]=$user;
                    $mode="sesion";
                    $datauser=$ObjUsuario->get($mode,$data);
                    $response=$ObjSesion->authentication($user,$password,$datauser);
										echo json_encode($response);
                break;

                case "unlogin":
                	$ObjSesion->unlogin();
                break;

            }

        }else{echo json_encode($respuesta);}
?>
