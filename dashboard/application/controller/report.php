<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjSendersNews = new SendersNews();
    $ObjNews = new News();
    $ObjExcel = new Excel();
    $ObjUtilidad = new Utilidad();
    $respuesta=false;
    $idUsuario=$_SESSION['usuario']["id"];
    @$AccionPost=$_POST["accion"];

        if (isset($AccionPost)) {

            switch ($AccionPost) {

                case "senders-news":
                    $data["idNoticia"]=$_POST["idNoticia"];
                    $sendersnews=$ObjSendersNews->get("report",$data);
                    $new = $ObjNews->get("one",$data);

                    if ($sendersnews!=null) {

                        $data=array();
                        $data["titulodoc"]=$new["asunto"];
                        $data["descriociondoc"]=$new["descripcion"];
                        $data["titulohoja"]="Noticia";
                        $data["encabezado"]=array("Nombre", "Vista" );
                        $data["datos"]=$sendersnews;
                        $ObjExcel->createexcel($data);

                    }

                break;

                case "senders-events":
                    $data["idEvento"]=$_POST["idEvento"];
                    $sendersevents=$ObjSendersEvents->get("report",$data);
                    $new = $ObjEvents->get("one",$data);

                    if ($sendersevents!=null) {

                        $data=array();
                        $data["titulodoc"]=$new["asunto"];
                        $data["descriociondoc"]=$new["descripcion"];
                        $data["titulohoja"]="Evento";
                        $data["encabezado"]=array("Nombre", "Vista" );
                        $data["datos"]=$sendersnews;
                        $ObjExcel->createexcel($data);

                    }

                break;

            }

       }else{echo json_encode($respuesta);}
?>
