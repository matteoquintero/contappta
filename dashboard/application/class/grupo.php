<?php

class Grupo
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Grupo');

		$dbdata->idInstitucion=$data["idInstitucion"];
		$dbdata->grado=$data["grado"];
		$dbdata->identificador=$data["identificador"];
          $dbdata->fechaRegistro=date('Y-m-d H:i:s');
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

  public function clear($id){

    $dbdata = DB_DataObject::Factory('Grupo');

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

  public function update($data){

    $dbdata = DB_DataObject::Factory('Grupo');

    $dbdata->grado=$data["grado"];
    $dbdata->identificador=$data["identificador"];

    $dbdata->whereAdd("id = '".$data["idGrupo"]."'");

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

        $dbdata = DB_DataObject::Factory('Grupo');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,idInstitucion,grado,identificador");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");
        $dbdata->whereAdd("clear = 'No'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idGrupo = $dbdata->id;
          $ret[$contador]->idInstitucion = $dbdata->idInstitucion;
          $ret[$contador]->institucion = $dbdata->institucion;
          $ret[$contador]->grado = $dbdata->grado;
          $ret[$contador]->identificador = $dbdata->identificador;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'one':

        $dbdata = DB_DataObject::Factory('Grupo');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,idInstitucion,grado,identificador");
        $dbdata->whereAdd("id='".$data['idGrupo']."'");
        $dbdata->whereAdd("clear = 'No'");
        $dbdata->find();
        while( $dbdata->fetch() ){
          $ret["idGrupo"] = $dbdata->id;
          $ret['idInstitucion'] = $dbdata->idInstitucion;
          $ret['grado'] = $dbdata->grado;
          $ret['identificador'] = $dbdata->identificador;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }

}

?>
