<?php

class Acudiente
{

  function __construct(){

  }

  public function create($data){

    $dbdata = DB_DataObject::Factory('Acudiente');
    $dbdata->idHijo=$data["idHijo"];
    $dbdata->idAcudiente=$data["idAcudiente"];
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


}

?>
