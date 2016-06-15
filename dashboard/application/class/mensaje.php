<?php

class Mensaje
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Mensaje');

    $dbdata->consecutivo=$data["consecutivo"];
    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->idConversacion=$data["idConversacion"];
    $dbdata->idNotificacion=$data["idNotificacion"];
    $dbdata->idReceptor=$data["idReceptor"];
    $dbdata->idEmisor=$data["idEmisor"];
    $dbdata->mensaje=$data["mensaje"];
    $dbdata->media=$data["media"];
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

  public function clear($id){

    $dbdata = DB_DataObject::Factory('Mensaje');

    $dbdata->clear="Si";
    $dbdata->whereAdd("id = $id");

    $dbdata->find();

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }

  public function getconsecutive(){
    $dbdata = DB_DataObject::Factory('Mensaje');
    $dbdata->selectAdd("consecutivo");
    $dbdata->orderBy("consecutivo desc");
    $dbdata->limit(1);
    $consecutivo=1;
    $dbdata->find();
    if( $dbdata->fetch() ){
      $consecutivo = intval($dbdata->consecutivo)+1;
    }

    $dbdata->free();
    return $consecutivo;
  }

  public function delete($data){

    $dbdata = DB_DataObject::Factory('Mensaje');

    $dbdata->eliminado="Si";
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

  public function view($data){

    $dbdata = DB_DataObject::Factory('Mensaje');

    $dbdata->visto="Si";
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

  public function update($data){

    $dbdata = DB_DataObject::Factory('Mensaje');

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
