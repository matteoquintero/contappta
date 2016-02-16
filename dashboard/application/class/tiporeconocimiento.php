<?php

class TipoReconocimiento
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'all':

        $dbdata = DB_DataObject::Factory('TipoReconocimiento');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,tipoReconocimiento,descripcion");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idTipoReconocimiento = $dbdata->id;
          $ret[$contador]->tipoReconocimiento = $dbdata->tipoReconocimiento;
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
