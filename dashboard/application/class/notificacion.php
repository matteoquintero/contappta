<?php

class Notificacion
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Notificacion');

      $dbdata->idEmisor=$data["idEmisor"];
      $dbdata->idInstitucion=$data["idInstitucion"];
  		$dbdata->asunto=$data["asunto"];
  		$dbdata->descripcion=$data["descripcion"];
      $dbdata->enlaceApp=$data["enlaceApp"];
      $dbdata->enlaceDashboard=$data["enlaceDashboard"];
      $dbdata->publicadaDashboard=$data["publicadaDashboard"];
  		$dbdata->publicadaApp=$data["publicadaApp"];
		  $dbdata->find();

		if ($dbdata->fetch()) {
			$resultado[0] = false;
		} else {

			$resultado[0] = true;
			$resultado[1] = $dbdata->insert();

		}

		$dbdata->free();

		return $resultado;

	}

  public function update($data){

    $dbdata = DB_DataObject::Factory('Notificacion');

    $dbdata->publicadaApp=$data["publicadaApp"];

    $dbdata->whereAdd("id = '".$data["idNotificacion"]."'");

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
