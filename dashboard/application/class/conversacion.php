<?php

class Conversacion
{

	function __construct(){

	}
	public function create($data){


    $conversation=$this->conversation($data["idEmisor"],$data["idReceptor"]);

    if ($conversation[0]) {

      $resultado[0] = true;
      $resultado[1] = $conversation[1];

    }else{

      $dbdata = DB_DataObject::Factory('Conversacion');
      $dbdata->idUsuarioUno=$data["idReceptor"];
  		$dbdata->idUsuarioDos=$data["idEmisor"];
      $dbdata->fechaRegistro=date('Y-m-d H:i:s');
      $resultado[0] = true;
      $resultado[1] = $dbdata->insert();
      $dbdata->free();

    }


		return $resultado;

	}

  private function conversation($idUsuarioUno,$idUsuarioDos){

    $dbdata = DB_DataObject::Factory('Conversacion');
    $dbdata->selectAdd();
    $dbdata->selectAdd("id");
    $dbdata->whereAdd("(idUsuarioUno='$idUsuarioUno' AND idUsuarioDos='$idUsuarioDos') OR (idUsuarioUno='$idUsuarioDos' AND idUsuarioDos='$idUsuarioUno')");
    $dbdata->find();
    $ret[0]=false;
    if( $dbdata->fetch() ){
      $ret[0]=true;
      $ret[1]= $dbdata->id;
    }

    $dbdata->free();
    return $ret;

  }

}

?>
