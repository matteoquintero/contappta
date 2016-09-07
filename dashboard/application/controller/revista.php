<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjRevista=new Revista();
    $ObjPagina=new Pagina();
    $ObjUtilidad=new Utilidad();
    $ObjNotificacion=new Notificacion();
    $ObjNotificacionReceptor=new NotificacionReceptor();
    $ObjPhone=new Phone();
    $ObjUsers=new Users();
    $resultado=false;
    @session_start();
    @$idUsuario=$_SESSION['usuario']["idUsuario"];
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case 'clear':
                  $ObjRevista->clear($_POST["magazine"]);
                  $ObjNotificacionReceptor->viewtype($_POST["magazine"]);
                break;

                case "create":

                    $consecutivo=$ObjRevista->getconsecutive();
                    $identificador=chr(rand(ord("A"), ord("Z"))).rand(0,9).chr(rand(ord("A"), ord("Z"))).$consecutivo;
                    $datamagazine["idInstitucion"]=$_POST["institute"];
										$datamagazine["revista"]=$_POST["namemagazine"];
                    $datamagazine["descripcion"]=$_POST["description"];
                    $datamagazine["identificador"]=$identificador;
                    $datamagazine["consecutivo"]=$consecutivo;

                    $magazine=$ObjRevista->create($datamagazine);

                    $datapage["idRevista"]=$magazine[1];
                    $ruta="../../_data/magazines/".$identificador."/";


                    for ($i=0; $i <  intval( $_POST["filesone"] ) ; $i++) {

                      $nombre=$i;
                      $nombrefile="fileone-".$i;

                      $pagina=$ObjUtilidad->GenerarArchivo($ruta, $nombre, $nombrefile);

                      $datapage["numeroPagina"]=$i;
                      $datapage["media"]=$pagina[1];

                      $ObjPagina->create($datapage);

                    }

                    $datanotification["idInstitucion"]=$_POST["institute"];
                    $datanotification["idEmisor"]=$idUsuario;
                    $datanotification["asunto"]="Revista nueva";
                    $datanotification["descripcion"]=$datamagazine["descripcion"];
                    $datanotification["enlaceApp"]="tab.magazine";
                    $datanotification["enlaceDashboard"]="revistas";
                    $datanotification["publicadaDashboard"]="Si";
                    $datanotification["publicadaApp"]="Si";

                    $notification=$ObjNotificacion->create($datanotification);

                    $data["tipo"]="magazine";
                    $data["idTipo"]=$magazine[1];
                    $data["idNotificacion"]=$notification[1];

                    $data["idInstitucion"]=$_POST["institute"];
                    $usersinstitution=$ObjUsers->get("institution",$data);

                    $sendersok=array();

                    foreach ($usersinstitution as $user) {
                      if (!in_array($user->idUsuario, $sendersok)) {
                        $data["idReceptor"]=$user->idUsuario;
                        $ObjNotificacionReceptor->create($data);
                        array_push($sendersok,$user->idUsuario);
                      }
                    }


                    $dataphone["page"]="revistas";
                    $dataphone["dataone"]=$magazine[1];
                    $ObjPhone->sendnotifications($notification[1],$dataphone);

										echo json_encode($magazine);

                break;

                case 'update':

                    $data["idRevista"]=$_POST["magazine"];
                    $data["idInstitucion"]=$_POST["institute"];
                    $data["revista"]=$_POST["namemagazine"];
                    $data["descripcion"]=$_POST["description"];

                    $response=$ObjRevista->update($data);
                    echo json_encode($response);
                break;


            }

        }else{echo json_encode($resultado);}
?>
