<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjUsuario=new Usuario();
    $ObjCifrado=new Cifrado();
    $ObjSesion=new Sesion();
    $ObjMail=new Mail();
    $ObjEmpresa=new Empresa();
    $ObjUtilidad=new Utilidad();
    $ObjProductoXUsuario=new ProductoXUsuario();
    $resultado=false;
	@session_start();
    $idUsuario=$_SESSION['usuario']["id"];
    @$AccionPost=$_POST["accion"];

        if (isset($AccionPost)) {

            switch ($AccionPost){

                case "activateacount":
                    $data["usuario"]=$_SESSION['usuario']["usuario"];
                    $data["correo"]=$_SESSION['usuario']["correo"];
                    $data["nombre"]=$_SESSION['usuario']["nombre"]." ".$_SESSION['usuario']["apellido"];
                    $response=$ObjUsuario->sendemailconfirmation($data);
                    echo json_encode($response);
                break;

                case "lack":
                    $lack=false;
                    $usuariologeado=$ObjSesion->UsuarioLogeado();
                    if ($usuariologeado) { $smarty->assign("usuariologeado",0);
                        $data["usuario"]=$_SESSION['usuario']["usuario"];
                        $lack=$ObjUsuario->percentagelack($data,"lack");
                    }
                    echo json_encode($lack);
                break;

                case 'uploadphoto':
                    $ruta="../../_data/profilepictures/";
                    $nombre=$_SESSION['usuario']["usuario"];
                    $nombrefile="file";
                    $resultado=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                    if ($resultado[0]==true) {
                        $data["foto"]=$resultado[1];
                        $data["usuario"]=$_SESSION["usuario"]["usuario"];
                        $ObjUsuario->update($data);
                    }
                    $resultado=trim($resultado[0]);
                    echo($resultado);
                break;

                case "register-1":
										$data["nombre"]=$_POST["nombre"];
										$data["celular"]=$_POST["celular"];
										$data["correo"]=$_POST["correo"];
										//$nueva="C247-".date("HY").rand(0,20);
										$nueva="C247";
										$data["contrasenaC247"]=$nueva;
										$data["contrasena"]=$ObjCifrado->encryptpassword($nueva);
										$data["foto"]="_data/profilepictures/profile-default.png";
										$data["idRol"]=1;
										$data["activo"]='No';
										$data["legal"]=$_POST["terms"];
										$data["mayor"]=$_POST["higher"];
										$resultado=$ObjUsuario->insert($data);
										
										$data["idUsuario"]=$resultado[1];
										$ObjEmpresa->insert($data);

                    //$data["idUsuario"]=$resultado[1];
                    //$data["nombre"]=$_POST["nombre"]." ".$_POST["apellido"];;
                    //$data["idProducto"]=6;
                    //$ObjProductoXUsuario->bond($data);

										$data["usuario"]=$resultado[2];
										$modo="sesion";
										$datauser=$ObjUsuario->get($modo,$data);

										$modo="networks";
										$response=$ObjSesion->Autenticacion('','',$datauser,$modo);
										echo json_encode($response);

                break;


                case "updatepassword":
                    $data["usuario"]=$_SESSION['usuario']["usuario"];
                    $modo="sesion";
                    $datauser=$ObjUsuario->get($modo,$data);
                    $contrasenaactual=$ObjCifrado->encryptpassword($_POST["contrasenaactual"]);
                    $resultado[0]=false;
                    if ($contrasenaactual===$datauser['contrasena']) {
                        $data["contrasena"]=$ObjCifrado->encryptpassword($_POST["contrasenanueva"]);
                        $resultado=$ObjUsuario->update($data);
                    }
                    echo json_encode($resultado);

                break;

                case "updatedemo":

                    $data["idUsuario"]=$idUsuario;
                    $data["usuario"]=$_POST["usuario"];
                    $data["nombre"]=$_POST["nombre"];
                    $data["apellido"]=$_POST["apellido"];
                    $data["documento"]=$_POST["documento"];
                    $data["correo"]=$_POST["correo"];
                    $data["telefono"]=$_POST["telefono"];
                    $data["celular"]=$_POST["celular"];
                    $data["direccion"]=$_POST["direccion"];
                    $data["idCiudad"]=$_POST["idCiudad"];
                    $data["fechaNacimiento"]=$_POST["fechaNacimiento"];
                    $data["demo"]="Si";
                    $resultado=$ObjUsuario->updatedemo($data);


                    $ObjUsuarioRed->updatedemo($data);
                    echo json_encode($resultado);

                break;

                case "update":

                    $data["usuario"]=$_SESSION['usuario']["usuario"];
                    $data["nombre"]=$_POST["nombre"];
                    $data["apellido"]=$_POST["apellido"];
                    $data["documento"]=$_POST["documento"];
                    $data["correo"]=$_POST["correo"];
                    $data["telefono"]=$_POST["telefono"];
                    $data["celular"]=$_POST["celular"];
                    $data["direccion"]=$_POST["direccion"];
                    $data["idCiudad"]=$_POST["idCiudad"];
                    $data["fechaNacimiento"]=$_POST["fechaNacimiento"];
                    $resultado=$ObjUsuario->update($data);
                    echo json_encode($resultado);

                break;

                case "email":

                    $data["correo"]=spaces($_POST["correo"]);
                    $data["correosesion"]=$ObjUsuario->getmail($idUsuario);
                    $modo="email";
                    $resultado=$ObjUsuario->get($modo,$data);
                    echo json_encode($resultado);

                break;

                case "user":

                    $data["usuario"]=spaces($_POST["usuario"]);
                    $data["usuariosesion"]=$ObjUsuario->getuser($idUsuario);
                    $modo="user";
                    $resultado=$ObjUsuario->get($modo,$data);
                    echo json_encode($resultado);

                break;

                case "data":

                    $data["idUsuario"]=$_POST["idUsuario"];
                    $modo="data";
                    $resultado=$ObjUsuario->get($modo,$data);
                    echo json_encode($resultado);

                break;

                case "useractive":

                    echo json_encode(strtolower($_SESSION['usuario']["usuario"]));

                break;

                case "remember":

                    $data["correo"]=$_POST["correo"];
                    $modo="email";
                    $datauser=$ObjUsuario->get($modo,$data);

                    $user=$ObjUsuario->cleanuser($datauser["usuario"]);
                    $datauser["usuario"]=$user;
                    $datau["usuario"]=$user;
                    $resultado=$ObjUsuario->update($datau);

                    switch ($_POST["remember"]) {

                        case 'user':

                            $subject="Recuerde su usuario de Casos 24-7";
                            $to[0]->correo=$data["correo"];
                            $to[0]->nombre=$datauser["nombre"];
                            $template="user.html";
                            $datamail[0]=$datauser["usuario"];
                            $response=$ObjMail->sendemail($subject,$to,$template,$datamail,"text");

                        break;

                        case 'password':

                            $nueva="C247".date("mdyhms");
                            $data["contrasena"]=$ObjCifrado->encryptpassword($nueva);
                            $data["usuario"]=$datauser["usuario"];
                            $ObjUsuario->update($data);

                            $subject="Su nueva contraseña de Casos 24-7";
                            $to[0]->correo=$data["correo"];
                            $to[0]->nombre=$datauser["nombre"];
                            $template="password.html";
                            $datamail[0]=$datauser["usuario"];
                            $datamail[1]=$nueva;
                            $response=$ObjMail->sendemail($subject,$to,$template,$datamail,"text");

                        break;

                    }
                    echo json_encode($response);

                break;



            }

        }else{echo json_encode($resultado);}
?>
