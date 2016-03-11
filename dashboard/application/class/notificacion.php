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

  public function publicateapp($notification){

    $dbdata = DB_DataObject::Factory('Notificacion');

    $dbdata->publicadaApp="Si";
    $dbdata->whereAdd("id = '$notification'");

    $dbdata->find();

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {

      $resultado[0] = true;

    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }

  public function ispublicateapp($notification){

    $dbdata = DB_DataObject::Factory('Notificacion');

    $dbdata->whereAdd("id = '$notification'");

    $dbdata->find();

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {

      if ($dbdata->publicadaApp=="Si") {
        return true;
      }else{
        return false;
      }

    } else {
      return false;
    }

    $dbdata->free();

  }


}

?>
