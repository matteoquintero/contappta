<?php

class Evento
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Evento');
    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->idNotificacion=$data["idNotificacion"];
    $dbdata->idEmisor=$data["idEmisor"];
    $dbdata->asunto=$data["asunto"];
    $dbdata->descripcion=$data["descripcion"];
    $dbdata->fechaPublicacion=(empty($data["fechaPublicacion"]))? date("Y/m/d H:i:s"):$data["fechaPublicacion"];
    $dbdata->fechaInicio=$data["fechaInicio"];
    $dbdata->fechaFin=$data["fechaFin"];
    $dbdata->aprobado=$data["aprobado"];
    $dbdata->publicado=($data["aprobado"]=="No") ? "No" : $data["publicado"];
      $dbdata->fechaRegistro=date('Y-m-d H:i:s');
    $create=$dbdata->insert();

    if ($create) {
      $resultado[0] = true;
      $resultado[1] = $create;
    } else {

      $resultado[0] = false;

    }
		$dbdata->free();

		return $resultado;

	}

  public function publicate($id){

    $dbdata = DB_DataObject::Factory('Evento');

    $dbdata->publicado="Si";
    $dbdata->whereAdd("id = $id");

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }

  public function clear($id){

    $dbdata = DB_DataObject::Factory('Evento');

    $dbdata->clear="Si";
    $dbdata->whereAdd("id = $id");

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }

  public function reminderminute($id){

    $dbdata = DB_DataObject::Factory('Evento');

    $dbdata->recordatorioMinuto="Si";
    $dbdata->whereAdd("id = $id");

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }

  public function reminderday($id){

    $dbdata = DB_DataObject::Factory('Evento');

    $dbdata->recordatorioDia="Si";
    $dbdata->whereAdd("id = $id");

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }

  public function update($data){


    $dbdata = DB_DataObject::Factory('Evento');

    $dbdata->asunto=$data["asunto"];
    $dbdata->descripcion=$data["descripcion"];
    $dbdata->fechaPublicacion=(empty($data["fechaPublicacion"]))? date("Y/m/d H:i:s"):$data["fechaPublicacion"];
    $dbdata->fechaInicio=$data["fechaInicio"];
    $dbdata->fechaFin=$data["fechaFin"];
    $dbdata->aprobado=$data["aprobado"];
    $dbdata->publicado=($data["aprobado"]=="No") ? "No" : $data["publicado"];

    $dbdata->whereAdd("id = '".$data["idEvento"]."'");

    $dbdata->find();

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }


  public function getreminder($event){
    $dbdata = DB_DataObject::Factory('Evento');
    $dbdata->selectAdd("recordatorio");
    $dbdata->whereAdd("id = $event");
    $dbdata->limit(1);
    $recordatorio=0;
    $dbdata->find();
    if( $dbdata->fetch() ){
      $recordatorio = intval($dbdata->recordatorio);
    }

    $dbdata->free();
    return $recordatorio;
  }


}

?>
