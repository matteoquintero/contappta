<?php

class Institucion
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Institucion');

		$dbdata->activo=$data["activo"];
    $dbdata->institucion=$data["institucion"];
		$dbdata->idTipoInstitucion=$data["idTipoInstitucion"];
    $dbdata->correo=$data["correo"];
    $dbdata->telefono=$data["telefono"];
		$dbdata->celular=$data["celular"];
    $dbdata->direccion=$data["direccion"];
		$dbdata->logo=$data["logo"];
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

    $dbdata = DB_DataObject::Factory('Institucion');
    $dbdata->activo=$data["activo"];
    $dbdata->institucion=$data["institucion"];
    $dbdata->idTipoInstitucion=$data["idTipoInstitucion"];
    $dbdata->correo=$data["correo"];
    $dbdata->telefono=$data["telefono"];
    $dbdata->celular=$data["celular"];
    $dbdata->direccion=$data["direccion"];
    $dbdata->logo=$data["logo"];

    $dbdata->whereAdd("id = '".$data["idInstitucion"]."'");

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
