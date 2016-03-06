<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjUsuario=new Usuario();
    $ObjCifrado=new Cifrado();
    $ObjSesion=new Sesion();
    $ObjUtilidad=new Utilidad();
    $ObjAcudiente=new Acudiente();
    $ObjUsers=new Users();
    $ObjReconocimientoUsuario=new ReconocimientoUsuario();
    $response=false;
	  @session_start();
    @$idUsuario=$_SESSION['usuario']["idUsuario"];
    @$idInstitucion=$_SESSION['usuario']["idInstitucion"];
    @$usuario=$_SESSION['usuario']["usuario"];
    @$action=$_POST["accion"];

        if (isset($action)) {

            switch ($action){

                case "create":

                    $data["usuario"]=$_POST['username'];
                    $data["contrasena"]=$ObjCifrado->encryptpassword($_POST["password"]);
                    $data["nombre"]=$_POST["name"];
                    $data["apellido"]=$_POST["lastname"];
                    $data["correo"]=$_POST["email"];
                    $data["celular"]=$_POST["smartphone"];
                    $data["documento"]=$_POST["document"];
                    $data["idRol"]=$_POST["role"];
                    $data["idInstitucion"]=$_POST["institute"];
                    $data["idGrupo"]=$_POST["group"];
                    $data["permiso"]=$_POST["permission"];
                    $data["foto"]=$_POST["_data/profilepictures/profile-default.png"];

                    $ruta="../../_data/profilepictures/";
                    $nombre=$_POST['username'];
                    $nombrefile="file-0";
                    $foto=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                    $data["foto"]=$foto[1];

                    $response=$ObjUsuario->create($data);

                    $data["idHijo"]= $response[1];
                   if (!empty($_POST["guardian"])) {
                        foreach ($_POST["guardian"] as $key => $value) {
                          $data["idAcudiente"]=$value;
                          $response=$ObjAcudiente->create($data);
                        }
                    }

                    $data["idUsuario"]= $response[1];
                   if (!empty($_POST["honor"])) {
                        foreach ($_POST["honor"] as $key => $value) {
                          $data["idReconocimiento"]=$value;
                          $response=$ObjReconocimientoUsuario->create($data);
                        }
                    }

                    echo json_encode($response);

                break;

                case "update":

                    $data["idUsuario"]=$_POST['user'];
                    $data["nombre"]=$_POST["name"];
                    $data["apellido"]=$_POST["lastname"];
                    $data["celular"]=$_POST["smartphone"];
                    $data["documento"]=$_POST["document"];
                    $data["idRol"]=$_POST["role"];
                    $data["idInstitucion"]=$_POST["institute"];
                    $data["idGrupo"]=$_POST["group"];
                    $data["permiso"]=$_POST["permission"];
                    $data["foto"]=$_POST["_data/profilepictures/profile-default.png"];

                    $ruta="../../_data/profilepictures/";
                    $nombre=$_POST['namephoto'];
                    $nombrefile="file-0";
                    $foto=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                    $data["foto"]=$foto[1];

                    $response=$ObjUsuario->update($data);

                    $data["idHijo"]= $response[1];
                   if (!empty($_POST["guardian"])) {
                        foreach ($_POST["guardian"] as $key => $value) {
                          $data["idAcudiente"]=$value;
                          $response=$ObjAcudiente->create($data);
                        }
                    }

                    $data["idUsuario"]= $response[1];
                   if (!empty($_POST["honor"])) {
                        foreach ($_POST["honor"] as $key => $value) {
                          $data["idReconocimiento"]=$value;
                          $response=$ObjReconocimientoUsuario->create($data);
                        }
                    }

                    echo json_encode($response);

                break;


                case "update-private":

                    $data["idUsuario"]=$idUsuario;
                    $data["contrasena"]=$ObjCifrado->encryptpassword($_POST['password']);
                    $data["usuario"]=$_POST['username'];
                    $data["correo"]=$_POST['email'];
                    $response=$ObjUsuario->updateprivate($data);

                    echo json_encode($response);

                break;

                case "email":

                    $email=$_POST["correo"];
                    $response=$ObjUsers->existsemail($email);
                    echo json_encode($response);

                break;

                case "user":

                    $user=$_POST["usuario"];
                    $response=$ObjUsers->existsuser($user);
                    echo json_encode($response);

                break;

                case "username":

                    $data["idUsuario"]=$idUsuario;
                    $response=$ObjUsers->get("one",$data);
                    echo json_encode($response["usuario"]);

                break;

                case "oldpassword":

                    $password=$ObjCifrado->encryptpassword($_POST["password"]);
                    $response=$ObjUsers->oldpassword($idUsuario,$password);
                    echo json_encode($response);

                break;

                case "useractive":

                    echo json_encode(strtolower($usuario));

                break;

            }

        }else{echo json_encode($response);}
?>
