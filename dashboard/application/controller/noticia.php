  <?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjNoticia=new Noticia();
    $ObjNotificacion=new Notificacion();
    $ObjNoticiaReceptor=new NoticiaReceptor();
    $ObjNotificacionReceptor=new NotificacionReceptor();
    $ObjUtilidad=new Utilidad();
    $ObjUsers=new Users();
    $ObjPhone=new Phone();
    $resultado=false;
    @session_start();
    @$idUsuario=$_SESSION['usuario']["idUsuario"];
    @$accion=$_POST["accion"];
        if (isset($accion)) {

            switch ($accion){

                case "create":

                    $consecutivo=$ObjNoticia->getconsecutive();
                    $identificador=chr(rand(ord("A"), ord("Z"))).rand(0,9).chr(rand(ord("A"), ord("Z"))).$consecutivo;

                    $datanew["idInstitucion"]=$_POST["institute"];
                    $datanew["idEmisor"]=$idUsuario;
                    $datanew["consecutivo"]=$consecutivo;
                    $datanew["idPlantilla"]=$_POST["template"];
                    $datanew["asunto"]=$_POST["subject"];
                    $datanew["descripcion"]=$_POST["description"];
                    $datanew["aprobada"]=( $_POST["approved"] ) ? "Si" : "No";
                    $datanew["respuesta"]=( $_POST["answer"] ) ? "Si" : "No";
                    $datanew["publicada"]=( $_POST["publishnow"] ) ? "Si" : "No";
                    $datanew["fechaPublicacion"]=$_POST["datepublication"];

                    if (empty($_POST["videoid"])) {
                      $ruta="../../_data/news/";
                      $nombre=$identificador;
                      $nombrefile="file-0";
                      $foto=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                      $datanew["media"]=$foto[1];
                    }else{
                      $datanew["media"]=$_POST["videoid"];
                    }

                    $datanotification["idInstitucion"]=$_POST["institute"];
                    $datanotification["idEmisor"]=$idUsuario;
                    $datanotification["asunto"]="Noticia nueva";
                    $datanotification["descripcion"]=$datanew["asunto"];
                    $datanotification["enlaceApp"]="enlaceApp";
                    $datanotification["enlaceDashboard"]="noticias";
                    $datanotification["publicadaDashboard"]="Si";
                    $datanotification["publicadaApp"]=($datanew["aprobada"]=="Si" && $datanew["publicada"]=="Si") ? "Si" : "No";

                    $notification=$ObjNotificacion->create($datanotification);

                    $datanew["idNotificacion"]=$notification[1];

                    $new=$ObjNoticia->create($datanew);

                    $data["idNoticia"]=$new[1];
                    $data["idNotificacion"]=$notification[1];

                   //Receptores
                   if (!empty($_POST["sender"])) {

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
                                  $ObjNotificacionReceptor->create($data);

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
                                  $ObjNotificacionReceptor->create($data);

                                  array_push($sendersok,$user->idUsuario);
                                }
                              }

                            break;
                            case 'user':

                              if (!in_array($senders[0], $sendersok)) {
                                $data["idReceptor"]=$senders[0];

                                $ObjNoticiaReceptor->create($data);
                                $ObjNotificacionReceptor->create($data);

                                array_push($sendersok,$senders[0]);
                              }

                            break;
                          }

                        }
                    }

                    if ($datanotification["publicadaApp"]=="Si") {

                      $ObjPhone->sendnotifications($notification[1]);

                    }

                    echo json_encode($new);

                break;

                case 'update':

                    $datanew["idNoticia"]=$_POST["new"];
                    $datanew["asunto"]=$_POST["subject"];
                    $datanew["descripcion"]=$_POST["description"];
                    $datanew["aprobada"]=( $_POST["approved"] ) ? "Si" : "No";
                    $datanew["respuesta"]=( $_POST["answer"] ) ? "Si" : "No";
                    $datanew["publicada"]=( $_POST["publishnow"] ) ? "Si" : "No";
                    $datanew["eliminada"]=( $_POST["deleted"] ) ? "Si" : "No";
                    $datanew["fechaPublicacion"]=$_POST["datepublication"];

                    if (!$ObjNotificacion->ispublicateapp($_POST["notification"])) {

                      if($datanew["aprobada"]=="Si" && $datanew["publicada"]=="Si"){
                        $ObjNotificacion->publicateapp($_POST["notification"]);
                        $ObjPhone->sendnotifications($_POST["notification"]);
                      }

                    }

                    $response=$ObjNoticia->update($datanew);
                    echo json_encode($response);

                break;

                case 'app':

                    $response=$ObjNews->get("app",$data);
                    echo json_encode($response);

                break;

            }

        }else{echo json_encode($resultado);}
?>
