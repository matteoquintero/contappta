<?php

class SendersMessages
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'message':

        $dbdata = DB_DataObject::Factory('SendersMessages');
        $dbdata->selectAdd();
        $dbdata->selectAdd("nombre,apellido,usuario,vista,idMensaje");
        $dbdata->whereAdd("idMensaje='".$data["idMensaje"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->nombre = $dbdata->nombre." ".$dbdata->apellido;
          $ret[$contador]->usuario = $dbdata->usuario;
          $ret[$contador]->vista = $dbdata->vista;
          $ret[$contador]->idMensaje = $dbdata->idMensaje;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'all':

        $dbdata = DB_DataObject::Factory('SendersMessages');
        $dbdata->selectAdd();
        $dbdata->selectAdd("nombre,apellido,usuario,vista,idMensaje");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->nombre = $dbdata->nombre." ".$dbdata->apellido;
          $ret[$contador]->usuario = $dbdata->usuario;
          $ret[$contador]->vista = $dbdata->vista;
          $ret[$contador]->idMensaje = $dbdata->idMensaje;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }

}

?>
