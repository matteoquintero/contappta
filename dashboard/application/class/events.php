<?php

class Events
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'app-calender':

        $dbdata = DB_DataObject::Factory('Events');
        $dbdata->selectAdd();
        $dbdata->selectAdd("fechaInicio");
        $dbdata->whereAdd("aprobado='Si'");
        $dbdata->whereAdd("publicado='Si'");
        $dbdata->whereAdd("idEvento IN(".$this->eventsreciver($data["idReceptor"]).")");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->fechaInicio = $dbdata->fechaInicio;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'publication':

        $dbdata = DB_DataObject::Factory('Events');
        $dbdata->selectAdd();
        $dbdata->selectAdd("fechaPublicacion,idEvento,idNotificacion");
        $dbdata->whereAdd("publicado = 'No'");
        $dbdata->whereAdd("aprobado = 'Si'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idEvento = $dbdata->idEvento;
          $ret[$contador]->idNotificacion = $dbdata->idNotificacion;
          $ret[$contador]->fechaPublicacion = $dbdata->fechaPublicacion;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'app-date':

        $dbdata = DB_DataObject::Factory('Events');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idEvento,asunto");
        $dbdata->whereAdd("aprobado='Si'");
        $dbdata->whereAdd("publicado='Si'");
        $dbdata->whereAdd("fechaInicio ='".$data["fechaInicio"]."'");
        $dbdata->whereAdd("idEvento IN(".$this->eventsreciver($data["idReceptor"]).")");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idEvento = $dbdata->idEvento;
          $ret[$contador]->asunto = $dbdata->asunto;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'app-id':

        $dbdata = DB_DataObject::Factory('Events');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idEvento,aprobado,asunto,descripcion,fechaInicio,fechaFin,fechaPublicacion");
        $dbdata->whereAdd("aprobado='Si'");
        $dbdata->whereAdd("publicado='Si'");
        $dbdata->whereAdd("idEvento='".($data["idEvento"])."'");
        $dbdata->find();
        if( $dbdata->fetch() ){
          $ret["id"] = $dbdata->idEvento;
          $ret["asunto"] = $dbdata->asunto;
          $ret["fechaInicio"] = $dbdata->fechaInicio;
          $ret["fechaFin"] = $dbdata->fechaFin;
          $ret["descripcion"] = $dbdata->descripcion;
          $ret["avatar"] = RUTADATA.$dbdata->foto;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'institution':

        $dbdata = DB_DataObject::Factory('Events');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idEvento,aprobado,asunto,descripcion,fechaInicio,fechaFin,fechaPublicacion");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idEvento = $dbdata->idEvento;
          $ret[$contador]->aprobado = $dbdata->aprobado;
          $ret[$contador]->asunto = format($dbdata->asunto,"html");
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
        $dbdata->selectAdd("idEvento,aprobado,publicado,eliminado,asunto,descripcion,fechaInicio,fechaFin,fechaPublicacion");
        $dbdata->whereAdd("idEvento='".$data['idEvento']."'");
        $dbdata->find();
        while( $dbdata->fetch() ){
          $ret["idEvento"] = $dbdata->idEvento;
          $ret['aprobado'] = $dbdata->aprobado;
          $ret['publicado'] = $dbdata->publicado;
          $ret['eliminado'] = $dbdata->eliminado;
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

private function eventsreciver($reciver){
    $dbdata = DB_DataObject::Factory('EventoXReceptor');
    $dbdata->selectAdd();
    $dbdata->selectAdd("idEvento");
    $dbdata->whereAdd("idReceptor='$reciver'");
    $dbdata->find();
      $contador=0;
    while( $dbdata->fetch() ){
      $ret[$contador] = $dbdata->idEvento;
      $contador++;
    }
    $dbdata->free();
    $events = implode (",", $ret);
    return $events;
  }

}

?>
