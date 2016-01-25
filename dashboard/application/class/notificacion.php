<?php

class Institucion
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Institucion');

		$dbdata->activo=$data["activo"];
		$dbdata->nombre=$data["nombre"];
		$dbdata->correo=$data["correo"];
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
    $dbdata->nombre=$data["nombre"];
    $dbdata->correo=$data["correo"];
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


  public function get($modo,$data){

    switch ($modo) {

      case 'all':

        $dbdata = DB_DataObject::Factory('Institucion');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,activo,nombre,correo,direccion,logo");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idInstitucion = $dbdata->id;
          $ret[$contador]->activo = $dbdata->activo;
          $ret[$contador]->nombre = $dbdata->nombre;
          $ret[$contador]->correo = $dbdata->correo;
          $ret[$contador]->direccion = $dbdata->direccion;
          $ret[$contador]->logo = $dbdata->logo;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;


      case 'one':

        $dbdata = DB_DataObject::Factory('Institucion');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,activo,nombre,correo,direccion,logo");
        $dbdata->whereAdd("id=".$data['idInstitucion']);
        $dbdata->find();
        while( $dbdata->fetch() ){
          $ret['idInstitucion'] = $dbdata->id;
          $ret['activo'] = $dbdata->activo;
          $ret['nombre'] = $dbdata->nombre;
          $ret['correo'] = $dbdata->correo;
          $ret['direccion'] = $dbdata->direccion;
          $ret['logo'] = $dbdata->logo;
        }

        $dbdata->free();
        return $ret;

      break;

    }


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
