<?php

class Pagina
{

	function __construct(){

	}
	public function create($data){

		$dbdata = DB_DataObject::Factory('Pagina');

    $dbdata->idRevista=$data["idRevista"];
    $dbdata->numeroPagina=$data["numeroPagina"];
    $dbdata->pagina=$data["pagina"];
    $dbdata->media=$data["media"];
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

  public function get($modo,$data){

    switch ($modo) {

        case 'magazine':

        $dbdata = DB_DataObject::Factory('Pagina');
        $dbdata->selectAdd();
        $dbdata->selectAdd("media");
        $dbdata->whereAdd("idRevista = '".$data["idRevista"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->primero = ( $contador===0 ) ? false : true;
          $ret[$contador]->ultimo = ( $contador===intval( $this->pages($data["idRevista"]) )-1 ) ? false : true;
          $ret[$contador]->pagina = RUTADATA.$dbdata->media;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;


      break;

    }

  }


  public function pages($magazine){

    $dbdata = DB_DataObject::Factory('Pagina');
    $dbdata->selectAdd();
    $dbdata->selectAdd("count(id) as ultimo");
    $dbdata->whereAdd("idRevista = '$magazine'");
    $dbdata->find();
    if( $dbdata->fetch() ){
      $ultimo = $dbdata->ultimo;
    }
    $dbdata->free();
    return $ultimo;

  }

}

?>
