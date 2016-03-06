<?php

class Magazines
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

        case 'institution':

        $dbdata = DB_DataObject::Factory('Magazines');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idInstitucion,idRevista,portada");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idInstitucion = $dbdata->idInstitucion;
          $ret[$contador]->idRevista = $dbdata->idRevista;
          $ret[$contador]->portada = RUTADATA.$dbdata->portada;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;


      break;

    }

  }

}

?>
