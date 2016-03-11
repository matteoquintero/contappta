  <?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjEvento=new Evento();
    $ObjEventoReceptor=new EventoReceptor();
    $ObjUtilidad=new Utilidad();
    $ObjUsers=new Users();
    $ObjNotificacion=new Notificacion();
    $ObjNotificacionReceptor=new NotificacionReceptor();
    $ObjPhone=new Phone();
    $resultado=false;
    @session_start();
    @$idUsuario=$_SESSION['usuario']["idUsuario"];
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case "create":

                    $dataevent["idInstitucion"]=$_POST["institute"];
                    $dataevent["idEmisor"]=$idUsuario;
                    $dataevent["asunto"]=$_POST["subject"];
                    $dataevent["descripcion"]=$_POST["description"];
                    $dataevent["aprobado"]=( $_POST["approved"] ) ? "Si" : "No";
                    $dataevent["publicado"]=( $_POST["publishnow"] ) ? "Si" : "No";
                    $dataevent["fechaPublicacion"]=$_POST["datepublication"];

                    $dateevent=explode("-",$_POST["dateevent"]);
                    $dataevent["fechaInicio"]=trim($dateevent[0]);
                    $dataevent["fechaFin"]=trim($dateevent[1]);

                    $datanotification["idInstitucion"]=$_POST["institute"];
                    $datanotification["idEmisor"]=$idUsuario;
                    $datanotification["asunto"]="Evento nuevo";
                    $datanotification["descripcion"]=$dataevent["asunto"];
                    $datanotification["enlaceApp"]="enlaceApp";
                    $datanotification["enlaceDashboard"]="noticias";
                    $datanotification["publicadaDashboard"]="Si";
                    $datanotification["publicadaApp"]=($dataevent["aprobado"]=="Si" && $dataevent["publicado"]=="Si") ? "Si" : "No";

                    $notification=$ObjNotificacion->create($datanotification);

                    $dataevent["idNotificacion"]=$notification[1];

										$event=$ObjEvento->create($dataevent);

                    $data["idEvento"]=$event[1];
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

                                  $ObjEventoReceptor->create($data);
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

                                  $ObjEventoReceptor->create($data);
                                  $ObjNotificacionReceptor->create($data);

                                  array_push($sendersok,$user->idUsuario);
                                }
                              }

                            break;
                            case 'user':

                              if (!in_array($senders[0], $sendersok)) {

                                $data["idReceptor"]=$senders[0];

                                $ObjEventoReceptor->create($data);
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

                    echo json_encode($event);
                break;

                case 'update':

                    $dataevent["idEvento"]=$_POST["event"];
                    $dataevent["asunto"]=$_POST["subject"];
                    $dataevent["descripcion"]=$_POST["description"];
                    $dataevent["aprobado"]=( $_POST["approved"] ) ? "Si" : "No";
                    $dataevent["publicado"]=( $_POST["publishnow"] ) ? "Si" : "No";
                    $dataevent["eliminado"]=( $_POST["deleted"] ) ? "Si" : "No";
                    $dataevent["fechaPublicacion"]=$_POST["datepublication"];

                    $dateevent=explode("-",$_POST["dateevent"]);
                    $dataevent["fechaInicio"]=trim($dateevent[0]);
                    $dataevent["fechaFin"]=trim($dateevent[1]);


                    if (!$ObjNotificacion->ispublicateapp($_POST["notification"])) {

                      if($dataevent["aprobada"]=="Si" && $dataevent["publicada"]=="Si"){
                        $ObjNotificacion->publicateapp($_POST["notification"]);
                        $ObjPhone->sendnotifications($_POST["notification"]);
                      }

                    }



                    $response=$ObjEvento->update($dataevent);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
