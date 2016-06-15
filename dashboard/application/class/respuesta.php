<?php

class Respuesta
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Respuesta');

    $dbdata->idNoticia=$data["idNoticia"];
    $dbdata->idUsuario=$data["idUsuario"];
    $dbdata->respuesta=$data["respuesta"];
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

}

?>
