<?php

class Reconocimiento
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Reconocimiento');

    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->reconocimiento=$data["reconocimiento"];
    $dbdata->idTipoReconocimiento=$data["idTipoReconocimiento"];
    $dbdata->descripcion=$data["descripcion"];

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

    $dbdata = DB_DataObject::Factory('Reconocimiento');

    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->reconocimiento=$data["reconocimiento"];
    $dbdata->idTipoReconocimiento=$data["idTipoReconocimiento"];
    $dbdata->descripcion=$data["descripcion"];

    $dbdata->whereAdd("id = '".$data["idReconocimiento"]."'");

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
