<?php
    require("application/requires.php");
    $Ruta="application/";
    IncluirArchivos($Ruta);
    $ObjNews=new News();
    $ObjNoticia=new Noticia();
    $ObjEvents=new Events();
    $ObjEvento=new Evento();
    $ObjUtilidad=new Utilidad();
    $ObjNotificacion=new Notificacion();
    $ObjPhone=new Phone();

    $news=$ObjNews->get("publication","");
    foreach ($news as $new) {
      if ( $ObjUtilidad->operationdate("equal","",$new->fechaPublicacion,"") || $ObjUtilidad->operationdate("greater","",$new->fechaPublicacion,"") ) {

        $datanew["idNoticia"]=$new->idNoticia;
        $datanew["publicada"]="Si";
        $ObjNoticia->update($datanew);
        $ObjNotificacion->publicateapp($new->idNotificacion);
        $ObjPhone->sendnotifications($_POST["notification"]);

      }
    }

    $events=$ObjEvents->get("publication","");
    foreach ($events as $event) {
      if ( $ObjUtilidad->operationdate("equal","",$event->fechaPublicacion,"") || $ObjUtilidad->operationdate("greater","",$event->fechaPublicacion,"") ) {

        $dataevent["idEvento"]=$event->idEvento;
        $dataevent["publicado"]="Si";
        $ObjEvento->update($dataevent);
        $ObjNotificacion->publicateapp($event->idNotificacion);
        $ObjPhone->sendnotifications($_POST["notification"]);

      }
    }
    echo ":)";
?>
