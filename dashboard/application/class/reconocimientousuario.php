<?php

class ReconocimientoUsuario
{

	function __construct(){

	}

	public function create($data){

		$dbdata = DB_DataObject::Factory('ReconocimientoXUsuario');
    $dbdata->selectAdd("id");
		$dbdata->idUsuario=$data["idUsuario"];
		$dbdata->idReconocimiento=$data["idReconocimiento"];
          $dbdata->fechaRegistro=date('Y-m-d H:i:s');
		$dbdata->find();

		if ($dbdata->fetch()) {

      $resultado[1] = $dbdata->id;
			$resultado[0] = false;

		} else {

			$resultado[0] = true;
			$resultado[1] = $dbdata->insert();

		}

		$dbdata->free();

		return $resultado;

	}

  public function clear($idReUs){

    $dbdata = DB_DataObject::Factory('ReconocimientoXUsuario');

    $dbdata->clear="Si";
    $dbdata->whereAdd("id = $idReUs");

    $dbdata->find();

    if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
    } else {
      $resultado[0] = false;
    }

    $dbdata->free();

    return $resultado;

  }

  public function get($mode,$data){

    switch ($mode) {

      case 'notification':

        $dbdata = DB_DataObject::Factory('ReconocimientoXUsuario');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id");
        $dbdata->whereAdd("idUsuario='".$data["idHijo"]."'");
        $dbdata->whereAdd("clear='No'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idReconocimientoUsuario = $dbdata->id;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;
    }
  }


}

?>
