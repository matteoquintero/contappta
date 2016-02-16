<?php

class SendersNews
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'new':

        $dbdata = DB_DataObject::Factory('SendersNews');
        $dbdata->selectAdd();
        $dbdata->selectAdd("nombre,apellido,usuario,vista,idNoticia");
        $dbdata->whereAdd("idNoticia='".$data["idNoticia"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->nombre = $dbdata->nombre." ".$dbdata->apellido;
          $ret[$contador]->usuario = $dbdata->usuario;
          $ret[$contador]->vista = $dbdata->vista;
          $ret[$contador]->idNoticia = $dbdata->idNoticia;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'all':

        $dbdata = DB_DataObject::Factory('SendersNews');
        $dbdata->selectAdd();
        $dbdata->selectAdd("nombre,apellido,usuario,vista,idNoticia");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->nombre = $dbdata->nombre." ".$dbdata->apellido;
          $ret[$contador]->usuario = $dbdata->usuario;
          $ret[$contador]->vista = $dbdata->vista;
          $ret[$contador]->idNoticia = $dbdata->idNoticia;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }

}

?>
