<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjMail=new Mail();
    $respuesta=false;
    $idUsuario=$_SESSION['usuario']["id"];
    @$AccionPost=$_POST["accion"];

        if (isset($AccionPost)) {

            switch ($AccionPost) {

                case "contact":
                    $subject="Mensaje ".date("Y/m/d h:m A");
                    $to[0]->correo="micaso@casos24-7.co";
                    $to[0]->nombre="Contacto pagina";
                    $template="contact.html";
                    $datamail[0]=$_POST["nombre"];
                    $datamail[1]=$_POST["correo"];
                    $datamail[2]=$_POST["mensaje"];
                    $response=$ObjMail->sendemail($subject,$to,$template,$datamail,"text");
                    echo json_encode($response);

                break;

            }

        }else{echo json_encode($respuesta);}
?>
