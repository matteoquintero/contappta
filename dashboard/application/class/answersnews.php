<?php

class AnswersNews
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'new':

        $dbdata = DB_DataObject::Factory('AnswersNews');
        $dbdata->selectAdd();
        $dbdata->selectAdd("nombre,apellido,usuario,respuesta,idNoticia,idRespuesta");
        $dbdata->whereAdd("idNoticia='".$data["idNoticia"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->nombre = $dbdata->nombre." ".$dbdata->apellido;
          $ret[$contador]->usuario = $dbdata->usuario;
          $ret[$contador]->respuesta = $dbdata->respuesta;
          $ret[$contador]->idNoticia = $dbdata->idNoticia;
          $ret[$contador]->idRespuesta = $dbdata->idRespuesta;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'all':

        $dbdata = DB_DataObject::Factory('AnswersNews');
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
