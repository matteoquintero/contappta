<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjUsuario=new Usuario();
    $ObjCifrado=new Cifrado();
    $ObjSesion=new Sesion();
    $ObjUtilidad=new Utilidad();
    $ObjAcudiente=new Acudiente();
    $response=false;
	  @session_start();
    @$idUsuario=$_SESSION['usuario']["id"];
    @$ACCION=$_POST["accion"];

        if (isset($ACCION)) {

            switch ($ACCION){

                case "create":

                    $data["usuario"]=$_POST['user'];
                    $data["contrasena"]=$ObjCifrado->encryptpassword($_POST["contrasena"]);
                    $data["nombre"]=$_POST["name"];
                    $data["apellido"]=$_POST["lastname"];
                    $data["correo"]=$_POST["email"];
                    $data["celular"]=$_POST["smartphone"];
                    $data["documento"]=$_POST["document"];
                    $data["idRol"]=$_POST["role"];
                    $data["idInstitucion"]=$_POST["institution"];
                    $data["idGrupo"]=$_POST["group"];

                    $response=$ObjUsuario->insert($data);
                    $data["idHijo"]= $response[1];

                   if (empty($_POST["guardian"])) {
                        foreach ($_POST["guardian"] as $key => $value) {
                          $data["idAcudiente"]=$value;
                          $ObjAcudiente->insert($data);
                        }
                    }

                    echo json_encode($response);

                break;

                case "update":

                    $data["usuario"]=$_POST['user'];
                    $data["contrasena"]=$ObjCifrado->encryptpassword($_POST["contrasena"]);
                    $data["nombre"]=$_POST["name"];
                    $data["apellido"]=$_POST["lastname"];
                    $data["correo"]=$_POST["email"];
                    $data["celular"]=$_POST["smartphone"];
                    $data["idRol"]=$_POST["idRole"];
                    $data["idInstitucion"]=$_POST["idInstution"];
                    $data["idGrupo"]=$_POST["idGroup"];
                    $data["idPadre"]=$_POST["idFather"];
                    $data["idMadre"]=$_POST["idMother"];
                    $response=$ObjUsuario->insert($data);
                    echo json_encode($response);

                break;

                case "email":

                    $email=$_POST["correo"];
                    $response=$ObjUsuario->existsemail($email);
                    echo json_encode($response);

                break;

                case "user":

                    $user=$_POST["usario"];
                    $response=$ObjUsuario->existsuser($user);
                    echo json_encode($response);
                break;

            }

        }else{echo json_encode($response);}
?>
