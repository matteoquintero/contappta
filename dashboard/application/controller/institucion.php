<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjInstitucion=new Institucion();
    $ObjUtilidad=new Utilidad();
    $resultado=false;
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case "create":

										$data["activo"]=( $_POST["active"] ) ? "Si" : "No";
                    $data["institucion"]=$_POST["name"];
										$data["idTipoInstitucion"]=$_POST["institutionType"];
                    $data["correo"]=$_POST["email"];
                    $data["direccion"]=$_POST["address"];
                    $data["telefono"]=$_POST["phone"];
                    $data["celular"]=$_POST["smartphone"];
                    $data["logo"]=$_POST["_data/logosinstitutions/institution-default.png"];

                    $ruta="../../_data/logosinstitutions/";
                    $nombre=strtolower(str_replace(' ', '', $_POST["name"]));
                    $nombrefile="file-0";
                    $foto=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                    $data["logo"]=$foto[1];

										$response=$ObjInstitucion->create($data);
										echo json_encode($response);

                break;

                case 'update':
                    $data["activo"]=( $_POST["active"] ) ? "Si" : "No";
                    $data["institucion"]=$_POST["name"];
                    $data["idTipoInstitucion"]=$_POST["institutionType"];
                    $data["idInstitucion"]=$_POST["institution"];
                    $data["correo"]=$_POST["email"];
                    $data["direccion"]=$_POST["address"];
                    $data["telefono"]=$_POST["phone"];
                    $data["celular"]=$_POST["smartphone"];

                    $ruta="../../_data/logosinstitutions/";
                    $nombre=strtolower(str_replace(' ', '', $_POST["name"]));
                    $nombrefile="file-0";
                    $foto=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                    $data["logo"]=$foto[1];

                    $response=$ObjInstitucion->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
