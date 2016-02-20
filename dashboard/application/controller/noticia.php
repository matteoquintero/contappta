  <?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjNoticia=new Noticia();
    $ObjNoticiaReceptor=new NoticiaReceptor();
    $ObjUtilidad=new Utilidad();
    $ObjUsers=new Users();
    $resultado=false;
    @session_start();
    @$idUsuario=$_SESSION['usuario']["idUsuario"];
    @$accion=$_POST["accion"];
        if (isset($accion)) {

            switch ($accion){

                case "create":

                    $data["idInstitucion"]=$_POST["institute"];
                    $data["idEmisor"]=$idUsuario;
                    $data["idPlantilla"]=$_POST["template"];
                    $data["asunto"]=$_POST["subject"];
                    $data["descripcion"]=$_POST["description"];
                    $data["aprobada"]=( $_POST["approved"] ) ? "Si" : "No";
                    $data["respuesta"]=( $_POST["answer"] ) ? "Si" : "No";
                    $data["publicada"]=( $_POST["publishnow"] ) ? "Si" : "No";
                    $data["fechaPublicacion"]=$_POST["datepublication"];

                    if (empty($_POST["videoid"])) {
                      $ruta="../../_data/news/";
                      $nombre="new-".rand(1000,20000);
                      $nombrefile="file-0";
                      $foto=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                      $data["media"]=$foto[1];
                    }else{
                      $data["media"]=$_POST["videoid"];
                    }

										$response=$ObjNoticia->create($data);

                   //Receptores
                   if (!empty($_POST["sender"])) {

                        $data["idNoticia"]=$response[1];
                        $sendersok=array();

                        foreach ($_POST["sender"] as $key => $sender) {

                          $senders= explode("-",$sender);

                          switch ($senders[1]) {
                            case 'institution':

                              $data["idInstitucion"]=$senders[0];
                              $usersinstitution=$ObjUsers->get($senders[1],$data);
                              foreach ($usersinstitution as $user) {
                                if (!in_array($user->idUsuario, $sendersok)) {
                                  $data["idReceptor"]=$user->idUsuario;
                                  $ObjNoticiaReceptor->create($data);
                                  array_push($sendersok,$user->idUsuario);
                                }
                              }

                            break;
                            case 'group':

                              $data["idGrupo"]=$senders[0];
                              $usersgroup=$ObjUsers->get($senders[1],$data);
                              foreach ($usersgroup as $user) {
                                if (!in_array($user->idUsuario, $sendersok)) {
                                  $data["idReceptor"]=$user->idUsuario;
                                  $ObjNoticiaReceptor->create($data);
                                  array_push($sendersok,$user->idUsuario);
                                }
                              }

                            break;
                            case 'user':

                              if (!in_array($senders[0], $sendersok)) {
                                $data["idReceptor"]=$senders[0];
                                $ObjNoticiaReceptor->create($data);
                                array_push($sendersok,$senders[0]);
                              }

                            break;
                          }

                        }
                    }
                    echo json_encode($response);

                break;

                case 'update':

                    $data["idNoticia"]=$_POST["new"];
                    $data["asunto"]=$_POST["subject"];
                    $data["descripcion"]=$_POST["description"];
                    $data["aprobada"]=( $_POST["approved"] ) ? "Si" : "No";
                    $data["respuesta"]=( $_POST["answer"] ) ? "Si" : "No";
                    $data["publicada"]=( $_POST["publishnow"] ) ? "Si" : "No";
                    $data["eliminada"]=( $_POST["deleted"] ) ? "Si" : "No";
                    $data["fechaPublicacion"]=$_POST["datepublication"];

                    if (empty($_POST["video"])) {
                      $ruta="../../_data/news/";
                      $nombre="new-".rand(1000,20000);
                      $nombrefile="file-0";
                      $foto=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                      $data["media"]=$foto[1];
                    }else{
                      $data["media"]=$_POST["video"];
                    }

                    $response=$ObjNoticia->update($data);
                    echo json_encode($response);

                break;

                case 'app':

                    $response=$ObjNews->get("app",$data);
                    echo json_encode($response);

                break;

            }

        }else{echo json_encode($resultado);}
?>
