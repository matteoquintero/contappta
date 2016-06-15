<?php
    require("../requires.php");
    $Ruta="../";
    IncluirArchivos($Ruta);
    $ObjReconocimientoUsuario=new ReconocimientoUsuario();
    $ObjNotificacion=new Notificacion();
    $ObjNotificacionReceptor=new NotificacionReceptor();
    $ObjUsers=new Users();
    $ObjPhone=new Phone();
    @$idUsuario=$_SESSION['usuario']["idUsuario"];
    @$idInstitucion=$_SESSION['usuario']["idInstitucion"];
    $resultado=false;
    @$accion=$_POST["accion"];

        if (isset($accion)) {

            switch ($accion){

                case 'clear':
                  $ObjReconocimientoUsuario->clear($_POST["usre"]);
                  $ObjNotificacionReceptor->viewtype($_POST["usre"]);
                break;


                case 'create':

                  $data["idUsuario"]=$_POST["user"];
                  $data["idReconocimiento"]=$_POST["honor"];
                  $recousu=$ObjReconocimientoUsuario->create($data);

                  $datanotification["idInstitucion"]=$idInstitucion;
                  $datanotification["idEmisor"]=$idUsuario;
                  $datanotification["asunto"]="Reconocimiento nuevo";
                  $datanotification["descripcion"]="Su hijo ".$_POST["name"]." tiene un nuevo reconocimiento";
                  $datanotification["enlaceApp"]="tab.son";
                  $datanotification["enlaceDashboard"]="reconocimientos";
                  $datanotification["publicadaDashboard"]="Si";
                  $datanotification["publicadaApp"]="Si";
                  $notification=$ObjNotificacion->create($datanotification);

                  $data["idHijo"]=$_POST["user"];
                  $parents = $ObjUsers->get("guardiansson",$data);

                  foreach ($parents as $parent) {
                    $datanotirece["idTipo"]=$recousu[1];
                    $datanotirece["tipo"]="recognition";
                    $datanotirece["idNotificacion"]=$notification[1];
                    $datanotirece["idReceptor"]=$parent->idUsuario;
                    $ObjNotificacionReceptor->create($datanotirece);
                  }

                  $dataphone["page"]="reconocimientos";
                  $dataphone["dataone"]=$_POST["user"];
                  $ObjPhone->sendnotifications($notification[1],$dataphone);


                break;


            }

        }else{echo json_encode($resultado);}
?>
