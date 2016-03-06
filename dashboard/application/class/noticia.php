<?php

class Noticia
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Noticia');

    $dbdata->consecutivo=$data["consecutivo"];
    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->idNotificacion=$data["idNotificacion"];
    $dbdata->idEmisor=$data["idEmisor"];
		$dbdata->idPlantilla=$data["idPlantilla"];
    $dbdata->asunto=$data["asunto"];
    $dbdata->descripcion=$data["descripcion"];
    $dbdata->media=$data["media"];
    $dbdata->aprobada=$data["aprobada"];
    $dbdata->respuesta=$data["respuesta"];
    $dbdata->publicada=($data["aprobada"]=="No") ? "No" : $data["publicada"];
    $dbdata->fechaPublicacion=( empty($data["fechaPublicacion"]) ) ? date("Y/m/d") : $data["fechaPublicacion"];

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

  public function getconsecutive(){
    $dbdata = DB_DataObject::Factory('Noticia');
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

  public function update($data){

    $dbdata = DB_DataObject::Factory('Noticia');

    $dbdata->asunto=$data["asunto"];
    $dbdata->descripcion=$data["descripcion"];
    $dbdata->media=$data["media"];
    $dbdata->aprobada=$data["aprobada"];
    $dbdata->respuesta=$data["respuesta"];
    $dbdata->eliminada=$data["eliminada"];
    $dbdata->publicada=($data["aprobada"]=="No") ? "No" : $data["publicada"];
    $dbdata->fechaPublicacion=(empty($data["fechaPublicacion"]))? date("Y/m/d"):$data["fechaPublicacion"];

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
