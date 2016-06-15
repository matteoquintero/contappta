<?php
    date_default_timezone_set('America/Bogota');
    function printVar( $variable, $title = "" ){ $var = print_r( $variable, true ); echo "<pre style='background-color:#000000; color:#00FF00; border: dashed thin #FFFFFF;position:relative;width: 100%;z-index: 9999;'><strong>[$title]</strong> $var</pre>"; }
    @ini_set("display_errors",0);
    error_reporting(0);
    define('BASE', '/dashboard/');
    define('SITE', 'production');
    define('MIN', '.');
    define('RUTADATA', 'http://contappta.com/dashboard/');
    function format($message,$mode=""){

      switch ($mode) {
        case 'html':
          $message=nl2br($message);
        break;
        case 'trim':
          $message=spaces($message);
        break;
        case 'encode':
          $message=unicode_decode($message);
        break;
        case 'img':
          ( filter_var($message, FILTER_VALIDATE_URL) === FALSE ) ? $message=BASE.$message : $message=$message;
        break;
      }
      return $message;

    }
    include(realpath(dirname(__FILE__).'/application/db/DBO-cron.php'));
    include(realpath(dirname(__FILE__).'/application/db/db.news.php'));
    include(realpath(dirname(__FILE__).'/application/db/db.noticia.php'));
    include(realpath(dirname(__FILE__).'/application/db/db.events.php'));
    include(realpath(dirname(__FILE__).'/application/db/db.evento.php'));
    include(realpath(dirname(__FILE__).'/application/db/db.notificacion.php'));
    include(realpath(dirname(__FILE__).'/application/db/db.eventremindersday.php'));
    include(realpath(dirname(__FILE__).'/application/db/db.eventremindersminute.php'));
    include(realpath(dirname(__FILE__).'/application/db/db.reciversnotifications.php'));

    include(realpath(dirname(__FILE__).'/application/class/news.php'));
    include(realpath(dirname(__FILE__).'/application/class/noticia.php'));
    include(realpath(dirname(__FILE__).'/application/class/events.php'));
    include(realpath(dirname(__FILE__).'/application/class/evento.php'));
    include(realpath(dirname(__FILE__).'/application/class/notificacion.php'));
    include(realpath(dirname(__FILE__).'/application/class/eventsremindersday.php'));
    include(realpath(dirname(__FILE__).'/application/class/eventsremindersminute.php'));
    include(realpath(dirname(__FILE__).'/application/class/phone.php'));
    include(realpath(dirname(__FILE__).'/application/class/utilidad.php'));

    $ObjNews=new News();
    $ObjNoticia=new Noticia();
    $ObjEvents=new Events();
    $ObjEvento=new Evento();
    $ObjUtilidad=new Utilidad();
    $ObjNotificacion=new Notificacion();
    $ObjEventsRemindersDay=new EventsRemindersDay();
    $ObjEventsRemindersMinute=new EventsRemindersMinute();
    $ObjPhone=new Phone();

    //Publicar y notificar noticias
    $news=$ObjNews->get("publication","");

    foreach ($news as $new) {
      if ( $ObjUtilidad->operationdate("equal","",$new->fechaPublicacion,"") || $ObjUtilidad->operationdate("greater","",$new->fechaPublicacion,"") ) {

        $ObjNoticia->publicate($new->idNoticia);
        $ObjNotificacion->publicateapp($new->idNotificacion);
        $datanoti["page"]="noticias";
        $datanoti["dataone"]=$new->idNoticia;
        $ObjPhone->sendnotifications($new->idNotificacion,$datanoti);

      }
    }

    //Publicar eventos
    $events=$ObjEvents->get("publication","");
    foreach ($events as $event) {
      if ( $ObjUtilidad->operationdate("equal","",$event->fechaPublicacion,"") || $ObjUtilidad->operationdate("greater","",$event->fechaPublicacion,"") ) {
        $ObjEvento->publicate($event->idEvento);
      }
    }

    //Recordatorio de eventos día
    $reminders=$ObjEventsRemindersDay->get("reminders","");
    foreach ($reminders as $event) {

        $ObjEvento->reminderday($event->idEvento);
        $ObjNotificacion->publicateapp($event->idNotificacion);
        $datanoti["page"]="eventos";
        $datanoti["title"]="Mañana evento";
        $datanoti["dataone"]=$event->idEvento;
        $ObjPhone->sendnotifications($event->idNotificacion,$datanoti);

    }

    //Recordatorio de eventos minuto
    $reminders=$ObjEventsRemindersMinute->get("reminders","");

    foreach ($reminders as $event) {

        $ObjEvento->reminderminute($event->idEvento);
        $ObjNotificacion->publicateapp($event->idNotificacion);
        $datanoti["page"]="eventos";
        $datanoti["title"]="En minutos evento";
        $datanoti["dataone"]=$event->idEvento;
        $ObjPhone->sendnotifications($event->idNotificacion,$datanoti);

    }

    echo ":)";
?>
