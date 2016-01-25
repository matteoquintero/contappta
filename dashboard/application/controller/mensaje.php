<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjMensaje=new Mensaje();
    $ObjCasoXMensaje=new CasoXMensaje();
    $ObjFullMessages=new FullMessages();
    $idUsuario=$_SESSION["usuario"]["id"];
    @$AccionPost=$_POST["accion"];

        if (isset($AccionPost)) {

            switch ($AccionPost) {

                case "messages":

                    $data["idCaso"]=$_POST["idCaso"];
                    $jsonmessages=json_encode( $ObjFullMessages->get("caso",$data) );
                    echo unicode_decode($jsonmessages);

                break;

                case "updateseen":
                    $data["idCaso"]=$_POST["idCaso"];
                    $ObjCasoXMensaje->updateseen($data);
                break;

                case "insert":

                    $data["idUsuario"]=$_POST["idUsuario"];
                    $data["mensaje"]=$_POST["mensaje"];
                    $data["idCaso"]=$_POST["idCaso"];
                    $resultado=$ObjMensaje->insert($data);
                    $data["idMensaje"]=$resultado[1];
                    $ObjCasoXMensaje->insert($data);
                    echo json_encode($resultado);

                break;

            }

        }else{echo json_encode($respuesta);}
?>
