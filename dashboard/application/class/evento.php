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
    $dbdata->fechaPublicacion=(empty($data["fechaPublicacion"]))? date("Y/m/d"):$data["fechaPublicacion"];
    $dbdata->fechaInicio=$data["fechaInicio"];
    $dbdata->fechaFin=$data["fechaFin"];
    $dbdata->aprobado=$data["aprobado"];
    $dbdata->publicado=($data["aprobado"]=="No") ? "No" : $data["publicado"];

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

  public function update($data){

    $dbdata = DB_DataObject::Factory('Evento');

    $dbdata->asunto=$data["asunto"];
    $dbdata->descripcion=$data["descripcion"];
    $dbdata->fechaPublicacion=$data["fechaPublicacion"];
    $dbdata->fechaInicio=$data["fechaInicio"];
    $dbdata->fechaFin=$data["fechaFin"];
    $dbdata->aprobado=$data["aprobado"];
    $dbdata->publicado=($data["aprobado"]=="No") ? "No" : $data["publicado"];
    $dbdata->eliminado=$data["eliminado"];

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


}

?>
