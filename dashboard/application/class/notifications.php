<?php

class Notifications
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'institution':

        $dbdata = DB_DataObject::Factory('Notifications');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idNotificacion,asunto,descripcion,nombre,apellido");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idNotificacion = $dbdata->idNotificacion;
          $ret[$contador]->asunto = $dbdata->asunto;
          $ret[$contador]->descripcion = $dbdata->descripcion;
          $ret[$contador]->nombre = $dbdata->nombre;
          $ret[$contador]->apellido = $dbdata->apellido;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }

}

?>
