<?php

class EventoReceptor
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('EventoXReceptor');

		$dbdata->idEvento=$data["idEvento"];
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


}

?>
