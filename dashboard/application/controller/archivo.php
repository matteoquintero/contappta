<?php
	  require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjFullFiles=new FullFiles();
    $ObjUtilidad=new Utilidad();
    $ObjCartero=new Cartero();
    $ObjCaso=new Caso();
    $ObjArchivo=new Archivo();
    $ObjLogArchivo=new LogArchivo();
    $ObjCasoXArchivo=new CasoXArchivo();
    $idUsuario=$_SESSION["usuario"]["id"];
    @$AccionPost=$_POST["accion"];
    $respuesta[0]=false;

    if (isset($AccionPost)) {

        switch ($AccionPost) {

            case 'insertfiles':

                $data["idCaso"]=$_POST["idCaso"];
                $datacase=$ObjCaso->get("one",$data);
                $data["numeroRegistro"]=$datacase["numeroRegistro"];
                $data["idUsuario"]=$idUsuario;

                if ($_POST["archivo"]!="") {

                    foreach ($_POST["archivo"] as $key => $value) {

                        $cadena=str_replace("\\","",$value);
                        $datos=json_decode($cadena);

                        foreach ( $datos as $key2 => $value2) {

                            $data["ruta"]=$value2->ruta;
                            $data["nombreArchivo"]=$value2->nombre;
                            $data["tipo"]=$value2->tipo;
                            $data["descripcion"]=$value2->descripcion;
                            $respuesta=$ObjArchivo->insert($data);
                            $data["idArchivo"]=$respuesta[1];
                            $ObjCasoXArchivo->insert($data);
                            $ObjLogArchivo->insert($data);

                        }

                    }

                    $data["idEmisor"]=$_POST["idEmisor"];
                    $data["idReceptor"]=$_POST["idReceptor"];
                    $ObjCartero->newcarte($data,0);

                }

                echo json_encode($respuesta);

            break;

            case 'filecase':
                $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                $ruta="../../_data/".date('Y').".".$meses[date('m')-1]."/";
                sleep(1);
                $nombre="C247-".date("siYdHm");
                $nombrefile="file";
                $respuesta=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                echo json_encode($respuesta);
            break;

            case "files":
                $data["idCaso"]=$_POST["idCaso"];
                $jsonfiles=json_encode($ObjFullFiles->get("caso",$data));
                echo unicode_decode($jsonfiles);
            break;

        }

    }else{echo json_encode($respuesta);}
?>
