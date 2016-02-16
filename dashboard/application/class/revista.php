<?php

class Revista
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Revista');

    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->revista=$data["revista"];
    $dbdata->descripcion=$data["descripcion"];

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

  public function update($data){

    $dbdata = DB_DataObject::Factory('Revista');

    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->revista=$data["revista"];
    $dbdata->descripcion=$data["descripcion"];

    $dbdata->whereAdd("id = '".$data["idRevista"]."'");

    $dbdata->find();

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }

  public function get($modo,$data){

    switch ($modo) {

        case 'institution':

        $dbdata = DB_DataObject::Factory('Revista');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,idInstitucion,revista,descripcion");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idRevista = $dbdata->id;
          $ret[$contador]->idInstitucion = $dbdata->idInstitucion;
          $ret[$contador]->revista = $dbdata->revista;
          $ret[$contador]->descripcion = $dbdata->descripcion;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'one':

        $dbdata = DB_DataObject::Factory('Revista');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,idInstitucion,revista,descripcion");
        $dbdata->whereAdd("id=".$data['idRevista']);
        $dbdata->find();
        while( $dbdata->fetch() ){
          $ret["idRevista"] = $dbdata->id;
          $ret['idInstitucion'] = $dbdata->idInstitucion;
          $ret['revista'] = $dbdata->revista;
          $ret['descripcion'] = $dbdata->descripcion;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }


}

?>
