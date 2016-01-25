<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjSesion=new Sesion();
    $ObjInstitucion=new Institucion();
    $resultado=false;
	  @session_start();
    @$idUsuario=$_SESSION['usuario']["id"];
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case "create":
										$data["activo"]=( $_POST["active"] )? "Si" : "No";
										$data["nombre"]=$_POST["name"];
                    $data["correo"]=$_POST["email"];
                    $data["direccion"]=$_POST["address"];
										$data["logo"]=$_POST["logo"];
										$response=$ObjInstitucion->create($data);
										echo json_encode($response);

                break;

                case 'update':
                    $data["idInstitucion"]=$_POST["idInstitucion"];
                    $data["activo"]=( $_POST["active"] )? "Si" : "No";
                    $data["nombre"]=$_POST["name"];
                    $data["correo"]=$_POST["email"];
                    $data["direccion"]=$_POST["address"];
                    $data["logo"]=$_POST["logo"];
                    $response=$ObjInstitucion->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
