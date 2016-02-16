  <?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjMensaje=new Mensaje();
    $ObjMensajeReceptor=new MensajeReceptor();
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
                    $data["asunto"]=$_POST["subject"];
                    $data["descripcion"]=$_POST["description"];

                    $ruta="../../_data/messages/";
                    $nombre="message-".rand(1000,20000);
                    $nombrefile="file-0";
                    $foto=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);
                    $data["media"]=$foto[1];

										$response=$ObjMensaje->create($data);

                   //Receptores
                   if (!empty($_POST["sender"])) {

                        $data["idMensaje"]=$response[1];
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
                                  $ObjMensajeReceptor->create($data);
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
                                  $ObjMensajeReceptor->create($data);
                                  array_push($sendersok,$user->idUsuario);
                                }
                              }

                            break;
                            case 'user':

                              if (!in_array($senders[0], $sendersok)) {
                                $data["idReceptor"]=$senders[0];
                                $ObjMensajeReceptor->create($data);
                                array_push($sendersok,$senders[0]);
                              }

                            break;
                          }

                        }
                    }
                    echo json_encode($response);
                break;

                case 'update':

                    $data["idMensaje"]=$_POST["message"];
                    $data["asunto"]=$_POST["subject"];
                    $data["descripcion"]=$_POST["description"];

                    $response=$ObjMensaje->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
