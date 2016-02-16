<?php

class Noticia
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Noticia');
    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->idEmisor=$data["idEmisor"];
		$dbdata->idPlantilla=$data["idPlantilla"];
    $dbdata->asunto=$data["asunto"];
    $dbdata->descripcion=$data["descripcion"];
    $dbdata->media=$data["media"];
    $dbdata->aprobada=$data["aprobada"];
    $dbdata->respuesta=$data["respuesta"];
		$dbdata->fechaPublicacion=$data["fechaPublicacion"];

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

    $dbdata = DB_DataObject::Factory('Noticia');

    $dbdata->asunto=$data["asunto"];
    $dbdata->descripcion=$data["descripcion"];
    $dbdata->media=$data["media"];
    $dbdata->aprobada=$data["aprobada"];
    $dbdata->respuesta=$data["respuesta"];
    $dbdata->fechaPublicacion=$data["fechaPublicacion"];

    $dbdata->whereAdd("id = '".$data["idNoticia"]."'");

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
