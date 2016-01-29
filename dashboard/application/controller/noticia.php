  <?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjNoticia=new Noticia();
    $resultado=false;
    @session_start();
    @$idUsuario=$_SESSION['usuario']["id"];
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case "create":

                    $data["idInstitucion"]=$_POST["institute"];
                    $data["idEmisor"]=1;
                    $data["idPlantilla"]=$_POST["template"];
                    $data["asunto"]=$_POST["subject"];
                    $data["descripcion"]=$_POST["description"];
                    $data["media"]=$_POST["image"];
                    if(empty($_POST["image"])){
                      $data["media"]=$_POST["video"];
                    }
                    $data["aprobada"]=$_POST["approved"];
                    $data["fechaPublicacion"]=$_POST["datepublication"];
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
