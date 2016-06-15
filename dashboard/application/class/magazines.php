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

          $ret[$contador]->primero = ( $contador===0 ) ? false : true;
          $ret[$contador]->ultimo = ( $contador===intval( $this->magazines($data["idInstitucion"]) )-1 ) ? false : true;
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


  public function magazines($institute){

    $dbdata = DB_DataObject::Factory('Magazines');
    $dbdata->selectAdd();
    $dbdata->selectAdd("count(idRevista) as ultimo");
    $dbdata->whereAdd("idInstitucion = '$institute'");
    $dbdata->find();
    if( $dbdata->fetch() ){
      $ultimo = $dbdata->ultimo;
    }
    $dbdata->free();
    return $ultimo;

  }

}

?>
