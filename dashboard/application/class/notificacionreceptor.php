<?php

class NotificacionReceptor
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('NotificacionXReceptor');

		$dbdata->idNotificacion=$data["idNotificacion"];
		$dbdata->idReceptor=$data["idReceptor"];
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

  public function view($data){

    $dbdata = DB_DataObject::Factory('NotificacionXReceptor');

    $dbdata->vista="Si";
    $dbdata->whereAdd("idReceptor = '".$data["idReceptor"]."'");
    $dbdata->whereAdd("idNotificacion = '".$data["idNotificacion"]."'");
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
