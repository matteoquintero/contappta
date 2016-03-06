  <?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjMensaje=new Mensaje();
    $ObjConversacion=new Conversacion();
    $ObjUtilidad=new Utilidad();
    $ObjUsers=new Users();
    $ObjNotifcacion=new Notifcacion();
    $ObjNotificacionReceptor=new NotificacionReceptor();
    $resultado=false;
    @session_start();
    @$idUsuario=$_SESSION['usuario']["idUsuario"];
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case "create":

                    $consecutivo=$ObjMensaje->getconsecutive();
                    $identificador=chr(rand(ord("A"), ord("Z"))).rand(0,9).chr(rand(ord("A"), ord("Z"))).$consecutivo;

                    $data["idEmisor"]=$idUsuario;
                    $data["idInstitucion"]=$_POST["institute"];
                    $data["mensaje"]=$_POST["dispatch"];
                    $data["consecutivo"]=$consecutivo;

                    $ruta="../../_data/messages/";
                    $nombre=$identificador;
                    $nombrefile="file-0";
                    $foto=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                    $data["media"]=$foto[1];

                    $datanotification["idInstitucion"]=$_POST["institute"];
                    $datanotification["idEmisor"]=$idUsuario;
                    $datanotification["asunto"]="Mensaje nuevo";
                    $datanotification["descripcion"]=substr($data["mensaje"], 0,10);
                    $datanotification["enlaceApp"]="enlaceApp";
                    $datanotification["enlaceDashboard"]="noticias";
                    $datanotification["publicadaDashboard"]="Si";
                    $datanotification["publicadaApp"]="Si";

                    $notification=$ObjNotifcacion->create($datanotification);
                   //Receptores

                    $data["idNotificacion"]=$notification[1];

                    $sendersok=array();
                    array_push($sendersok,$idUsuario);

                    foreach ($_POST["sender"] as $key => $sender) {

                      $senders= explode("-",$sender);

                      switch ($senders[1]) {
                        case 'institution':

                          $data["idInstitucion"]=$senders[0];
                          $usersinstitution=$ObjUsers->get($senders[1],$data);

                          foreach ($usersinstitution as $user) {
                            if (!in_array($user->idUsuario, $sendersok)) {

                              $data["idReceptor"]=$user->idUsuario;

                              $conversation=$ObjConversacion->create($data);
                              $data["idConversacion"]=$conversation[1];

                              $ObjMensaje->create($data);
                              $ObjNotificacionReceptor->create($data);

                              array_push($sendersok,$user->idUsuario);
                              $response[0]=true;

                            }
                          }

                        break;
                        case 'group':

                          $data["idGrupo"]=$senders[0];
                          $usersgroup=$ObjUsers->get($senders[1],$data);

                          foreach ($usersgroup as $user) {
                            if (!in_array($user->idUsuario, $sendersok)) {

                              $data["idReceptor"]=$user->idUsuario;

                              $conversation=$ObjConversacion->create($data);
                              $data["idConversacion"]=$conversation[1];

                              $ObjMensaje->create($data);
                              $ObjNotificacionReceptor->create($data);

                              array_push($sendersok,$user->idUsuario);
                              $response[0]=true;
                            }
                          }

                        break;
                        case 'user':

                          if (!in_array($senders[0], $sendersok)) {

                            $data["idReceptor"]=$senders[0];

                            $conversation=$ObjConversacion->create($data);
                            $data["idConversacion"]=$conversation[1];

                            $ObjMensaje->create($data);
                            $ObjNotificacionReceptor->create($data);

                            array_push($sendersok,$senders[0]);
                            $response[0]=true;
                          }

                        break;
                      }

                    }

                    echo json_encode($response);
                break;

                case 'update':

                    $data["idMensaje"]=$_POST["message"];
                    $data["mensaje"]=$_POST["dispatch"];

                    $response=$ObjMensaje->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
