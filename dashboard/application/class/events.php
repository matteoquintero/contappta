<?php

class Events
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'all':

        $dbdata = DB_DataObject::Factory('Events');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idEvento,aprobado,asunto,descripcion,fechaInicio,fechaFin,fechaPublicacion");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idEvento = $dbdata->idEvento;
          $ret[$contador]->aprobado = $dbdata->aprobado;
          $ret[$contador]->asunto = $dbdata->asunto;
          $ret[$contador]->descripcion = $dbdata->descripcion;
          $ret[$contador]->fechaInicio = $dbdata->fechaInicio;
          $ret[$contador]->fechaPublicacion = $dbdata->fechaPublicacion;
          $ret[$contador]->fechaFin = $dbdata->fechaFin;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;


      case 'one':

        $dbdata = DB_DataObject::Factory('Events');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idEvento,aprobado,asunto,descripcion,fechaInicio,fechaFin,fechaPublicacion");
        $dbdata->whereAdd("idEvento=".$data['idEvento']);
        $dbdata->find();
        while( $dbdata->fetch() ){
          $ret["idEvento"] = $dbdata->idEvento;
          $ret['aprobado'] = $dbdata->aprobado;
          $ret['asunto'] = $dbdata->asunto;
          $ret['descripcion'] = $dbdata->descripcion;
          $ret['fechaInicio'] = $dbdata->fechaInicio;
          $ret['fechaPublicacion'] = $dbdata->fechaPublicacion;
          $ret['fechaFin'] = $dbdata->fechaFin;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }

}

?>
