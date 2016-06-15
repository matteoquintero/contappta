<?php

class NotificacionReceptor
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('NotificacionXReceptor');

    $dbdata->idNotificacion=$data["idNotificacion"];
    $dbdata->idConversacion=$data["idConversacion"];
    $dbdata->idTipo=$data["idTipo"];
		$dbdata->tipo=$data["tipo"];
		$dbdata->idReceptor=$data["idReceptor"];
    $dbdata->find();
      $dbdata->fechaRegistro=date('Y-m-d H:i:s');
    if ($dbdata->fetch()) {
      $resultado[0] = false;
    } else {

      $resultado[0] = true;
      $resultado[1] = $dbdata->insert();

    }

		$dbdata->free();

		return $resultado;

	}


  public function typeexist($type){

    $dbdata = DB_DataObject::Factory('NotificacionXReceptor');

    $dbdata->selectAdd();
    $dbdata->selectAdd("idTipo");
    $dbdata->whereAdd("idTipo = $type");
    $dbdata->find();

    if ($dbdata->fetch()) {
      $resultado = true;
    } else {
      $resultado = false;
    }

    $dbdata->free();

    return $resultado;

  }

  public function viewtype($idTipo){

    $dbdata = DB_DataObject::Factory('NotificacionXReceptor');

    $dbdata->vista="Si";
    $dbdata->whereAdd("idTipo = $idTipo");
    $dbdata->find();

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }

  public function view($data){

    $dbdata = DB_DataObject::Factory('NotificacionXReceptor');

    $dbdata->vista="Si";
    $dbdata->whereAdd("idReceptor = '".$data["idReceptor"]."'");
    $dbdata->whereAdd("idTipo = '".$data["idTipo"]."'");
    $dbdata->find();

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }


  public function viewmessages($data){

    $dbdata = DB_DataObject::Factory('NotificacionXReceptor');

    $dbdata->vista="Si";
    $dbdata->whereAdd("idReceptor = '".$data["idReceptor"]."'");
    $dbdata->whereAdd("idConversacion = '".$data["idConversacion"]."'");
    $dbdata->find();

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }
  public function getnews($user){

    $dbdata = DB_DataObject::Factory('NotificacionXReceptor');
    $dbdata->selectAdd();
    $dbdata->selectAdd("idNotificacion");
    $dbdata->whereAdd("idReceptor = $user");
    $dbdata->whereAdd("tipo = 'new'");
    $dbdata->whereAdd("vista = 'No'");
    $dbdata->find();
    $contador=0;
    while( $dbdata->fetch() ){
      $contador++;
    }

    $dbdata->free();
    return $contador;


  }
  public function getmessages($user){

    $dbdata = DB_DataObject::Factory('NotificacionXReceptor');
    $dbdata->selectAdd();
    $dbdata->selectAdd("idNotificacion");
    $dbdata->whereAdd("idReceptor = $user");
    $dbdata->whereAdd("tipo = 'message'");
    $dbdata->whereAdd("vista = 'No'");
    $dbdata->find();
    $contador=0;
    while( $dbdata->fetch() ){
      $contador++;
    }

    $dbdata->free();
    return $contador;

  }

  public function getevents($user){

    $dbdata = DB_DataObject::Factory('NotificacionXReceptor');
    $dbdata->selectAdd();
    $dbdata->selectAdd("idNotificacion");
    $dbdata->whereAdd("idReceptor = $user");
    $dbdata->whereAdd("tipo = 'event'");
    $dbdata->whereAdd("vista = 'No'");
    $dbdata->find();
    $contador=0;
    while( $dbdata->fetch() ){
      $contador++;
    }

    $dbdata->free();
    return $contador;

  }

  public function getmagazines($user){

    $dbdata = DB_DataObject::Factory('NotificacionXReceptor');
    $dbdata->selectAdd();
    $dbdata->selectAdd("idNotificacion");
    $dbdata->whereAdd("idReceptor = $user");
    $dbdata->whereAdd("tipo = 'magazine'");
    $dbdata->whereAdd("vista = 'No'");
    $dbdata->find();
    $contador=0;
    while( $dbdata->fetch() ){
      $contador++;
    }

    $dbdata->free();
    return $contador;

  }

  public function getrecognitions($user){

    $dbdata = DB_DataObject::Factory('NotificacionXReceptor');
    $dbdata->selectAdd();
    $dbdata->selectAdd("idNotificacion");
    $dbdata->whereAdd("idReceptor = $user");
    $dbdata->whereAdd("tipo = 'recognition'");
    $dbdata->whereAdd("vista = 'No'");
    $dbdata->find();
    $contador=0;
    while( $dbdata->fetch() ){
      $contador++;
    }

    $dbdata->free();
    return $contador;

  }



}

?>
