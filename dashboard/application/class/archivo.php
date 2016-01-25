<?php

class Archivo
{

	function __construct(){

	}
	public function insert($campos){

		$dbdata = DB_DataObject::Factory('Archivo');

		$dbdata->idUsuario=$campos["idUsuario"];
		$dbdata->ruta=$campos["ruta"];
		$dbdata->tipo=$campos["tipo"];
		$dbdata->descripcion=$campos["descripcion"];
		$dbdata->find();

		if ($dbdata->fetch()) {
			$resultado[0] = false;
		} else {

			$dbdata->nombre=$campos["nombreArchivo"];
			$resultado[0] = true;
			$resultado[1] = $dbdata->insert();
			$resultado[2] = $campos["numeroRegistro"];
			$resultado[3] = $campos["idTipoCaso"];

		}

		$dbdata->free();

		return $resultado;

	}


	public function delete($campos){

		$dbdata = DB_DataObject::Factory('Archivo');
		$dbdata->eliminado="Si";
		$dbdata->whereAdd("id = '".$campos["idArchivo"]."'");

		$dbdata->find();

		if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
			$resultado[0] = true;
			$resultado[1] = $dbdata->insert();
			$resultado[2] = $campos["numeroRegistro"];
			$resultado[3] = $campos["idTipoCaso"];
		} else {
			$resultado[0] = false;
		}

		$dbdata->free();

		return $resultado;

	}


}

?>