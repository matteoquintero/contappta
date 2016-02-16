<?php

class Mensaje
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Mensaje');
    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->idEmisor=$data["idEmisor"];
    $dbdata->asunto=$data["asunto"];
    $dbdata->mensaje=$data["mensaje"];
    $dbdata->media=$data["media"];

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

    $dbdata = DB_DataObject::Factory('Mensaje');

    $dbdata->asunto=$data["asunto"];
    $dbdata->mensaje=$data["mensaje"];
    $dbdata->media=$data["media"];

    $dbdata->whereAdd("id = '".$data["idMensaje"]."'");

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
