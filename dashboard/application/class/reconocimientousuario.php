<?php

class ReconocimientoUsuario
{

	function __construct(){

	}

	public function create($data){

		$dbdata = DB_DataObject::Factory('ReconocimientoXUsuario');
		$dbdata->idUsuario=$data["idUsuario"];
		$dbdata->idReconocimiento=$data["idReconocimiento"];
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


}

?>
