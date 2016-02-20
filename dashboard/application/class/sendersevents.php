<?php

class SendersEvents
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'event':

        $dbdata = DB_DataObject::Factory('SendersEvents');
        $dbdata->selectAdd();
        $dbdata->selectAdd("nombre,apellido,usuario,vista,idEvento");
        $dbdata->whereAdd("idEvento='".$data["idEvento"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->nombre = $dbdata->nombre." ".$dbdata->apellido;
          $ret[$contador]->usuario = $dbdata->usuario;
          $ret[$contador]->vista = $dbdata->vista;
          $ret[$contador]->idEvento = $dbdata->idEvento;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'all':

        $dbdata = DB_DataObject::Factory('SendersEvents');
        $dbdata->selectAdd();
        $dbdata->selectAdd("nombre,apellido,usuario,vista,idEvento");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->nombre = $dbdata->nombre." ".$dbdata->apellido;
          $ret[$contador]->usuario = $dbdata->usuario;
          $ret[$contador]->vista = $dbdata->vista;
          $ret[$contador]->idEvento = $dbdata->idEvento;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }

}

?>
