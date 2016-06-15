<?php

class EventsRemindersDay
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'reminders':

        $dbdata = DB_DataObject::Factory('Eventremindersday');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idEvento,idNotificacion,fechaInicio");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idEvento = $dbdata->idEvento;
          $ret[$contador]->idNotificacion = $dbdata->idNotificacion;
          $ret[$contador]->fechaInicio = $dbdata->fechaInicio;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }



}

?>
