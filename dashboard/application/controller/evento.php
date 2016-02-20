  <?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjEvento=new Evento();
    $ObjEventoReceptor=new EventoReceptor();
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
                    $data["aprobado"]=( $_POST["approved"] ) ? "Si" : "No";
                    $data["publicado"]=( $_POST["publishnow"] ) ? "Si" : "No";
                    $data["fechaPublicacion"]=$_POST["datepublication"];

                    $dateevent=explode("-",$_POST["dateevent"]);
                    $data["fechaInicio"]=trim($dateevent[0]);
                    $data["fechaFin"]=trim($dateevent[1]);

										$response=$ObjEvento->create($data);

                   //Receptores
                   if (!empty($_POST["sender"])) {

                        $data["idEvento"]=$response[1];
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
                                  array_push($sendersok,$user->idUsuario);
                                }
                              }

                            break;
                            case 'user':

                              if (!in_array($senders[0], $sendersok)) {
                                $data["idReceptor"]=$senders[0];
                                $ObjEventoReceptor->create($data);
                                array_push($sendersok,$senders[0]);
                              }

                            break;
                          }

                        }
                    }
                    echo json_encode($response);
                break;

                case 'update':

                    $data["idEvento"]=$_POST["event"];
                    $data["asunto"]=$_POST["subject"];
                    $data["descripcion"]=$_POST["description"];
                    $data["aprobado"]=( $_POST["approved"] ) ? "Si" : "No";
                    $data["publicado"]=( $_POST["publishnow"] ) ? "Si" : "No";
                    $data["eliminado"]=( $_POST["deleted"] ) ? "Si" : "No";
                    $data["fechaPublicacion"]=$_POST["datepublication"];

                    $dateevent=explode("-",$_POST["dateevent"]);
                    $data["fechaInicio"]=trim($dateevent[0]);
                    $data["fechaFin"]=trim($dateevent[1]);

                    $response=$ObjEvento->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
