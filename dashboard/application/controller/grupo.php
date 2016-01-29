<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjGrupo=new Grupo();
    $resultado=false;
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case "create":
										$data["idInstitucion"]=$_POST["institution"];
                    $data["grado"]=$_POST["degree"];
                    $data["identificador"]=$_POST["id"];
										$response=$ObjGrupo->create($data);
										echo json_encode($response);
                break;

                case 'update':
                    $data["idGrupo"]=$_POST["idGrupo"];
                    $data["idInstitucion"]=$_POST["institution"];
                    $data["grado"]=$_POST["degree"];
                    $data["identificador"]=$_POST["id"];
                    $response=$ObjGrupo->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
