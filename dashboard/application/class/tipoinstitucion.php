<?php

class TipoInstitucion
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'all':

        $dbdata = DB_DataObject::Factory('TipoInstitucion');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,tipoInstitucion,descripcion");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idTipoInstitucion = $dbdata->id;
          $ret[$contador]->tipoInstitucion = $dbdata->tipoInstitucion;
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
