<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjRevista=new Revista();
    $resultado=false;
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case "create":

                    $data["idInstitucion"]=$_POST["institute"];
										$data["revista"]=$_POST["magazine"];
                    $data["descripcion"]=$_POST["description"];

										$response=$ObjRevista->create($data);
										echo json_encode($response);

                break;

                case 'update':

                    $data["idInstitucion"]=$_POST["institute"];
                    $data["revista"]=$_POST["magazine"];
                    $data["descripcion"]=$_POST["description"];

                    $response=$ObjRevista->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
