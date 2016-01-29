<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjInstitucion=new Institucion();
    $resultado=false;
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case "create":
										$data["activo"]=( $_POST["active"] ) ? "Si" : "No";
										$data["institucion"]=$_POST["name"];
                    $data["correo"]=$_POST["email"];
                    $data["direccion"]=$_POST["address"];
										$data["logo"]=$_POST["logo"];
										$response=$ObjInstitucion->create($data);
										echo json_encode($response);

                break;

                case 'update':
                    $data["idInstitucion"]=$_POST["idInstitucion"];
                    $data["activo"]=( $_POST["active"] )? "Si" : "No";
                    $data["institucion"]=$_POST["name"];
                    $data["correo"]=$_POST["email"];
                    $data["direccion"]=$_POST["address"];
                    $data["logo"]=$_POST["logo"];
                    $response=$ObjInstitucion->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
