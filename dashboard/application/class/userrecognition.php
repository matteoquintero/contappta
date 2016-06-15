<?php

class UserRecognition
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'user':

        $dbdata = DB_DataObject::Factory('Userrecognition');
        $dbdata->selectAdd();
        $dbdata->selectAdd("reconocimiento,idReconocimientoUsuario,idUsuario,idReconocimiento");
        $dbdata->whereAdd("idUsuario='".$data["idUsuario"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->reconocimiento = $dbdata->reconocimiento;
          $ret[$contador]->idReconocimientoUsuario = $dbdata->idReconocimientoUsuario;
          $ret[$contador]->idUsuario = $dbdata->idUsuario;
          $ret[$contador]->idReconocimiento = $dbdata->idReconocimiento;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;



    }


  }

}

?>
