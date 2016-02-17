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

                    $data["idInstitucion"]=$_POST["institute"];
										$data["reconocimiento"]=$_POST["namehonor"];
                    $data["idTipoReconocimiento"]=$_POST["typeHonor"];
                    $data["descripcion"]=$_POST["description"];

										$response=$ObjReconocimiento->create($data);
										echo json_encode($response);

                break;

                case 'update':

                    $data["idReconocimiento"]=$_POST["honor"];
                    $data["idInstitucion"]=$_POST["institute"];
                    $data["reconocimiento"]=$_POST["namehonor"];
                    $data["idTipoReconocimiento"]=$_POST["typeHonor"];
                    $data["descripcion"]=$_POST["description"];

                    $response=$ObjReconocimiento->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
