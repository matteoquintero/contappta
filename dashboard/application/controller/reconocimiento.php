<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjReconocimiento=new Reconocimiento();
    $resultado=false;
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case "create":

										$data["reconocimiento"]=$_POST["honor"];
                    $data["idTipoReconocimiento"]=$_POST["typeHonor"];
                    $data["descripcion"]=$_POST["description"];

										$response=$ObjReconocimiento->create($data);
										echo json_encode($response);

                break;

                case 'update':

                    $data["reconocimiento"]=$_POST["honor"];
                    $data["idTipoReconocimiento"]=$_POST["typeHonor"];
                    $data["descripcion"]=$_POST["description"];

                    $response=$ObjReconocimiento->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
