<?php

class Plantilla
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'all':

        $dbdata = DB_DataObject::Factory('Plantilla');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,imagen,plantilla,descripcion");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idPlantilla = $dbdata->id;
          $ret[$contador]->imagen = $dbdata->imagen;
          $ret[$contador]->plantilla = $dbdata->plantilla;
          $ret[$contador]->descripcion = $dbdata->descripcion;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }

}

?>
