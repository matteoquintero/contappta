<?php
class Rol
{

  function __construct(){
  }

  public function get(){

    $dbdata = DB_DataObject::Factory('Rol');
    $dbdata->selectAdd("id,rol");
    $dbdata->find();
    $contador=0;
    while( $dbdata->fetch() ){
        $ret[$contador]->idRol = $dbdata->id;
        $ret[$contador]->rol = format($dbdata->rol,"encode");
        $contador++;
    }
    $dbdata->free();
    return $ret;


  }

  public function getid($rol){

    $dbdata = DB_DataObject::Factory('Rol');
    $dbdata->selectAdd("id");
    $dbdata->whereAdd("rol='$rol'");
    $dbdata->find();
    if( $dbdata->fetch() ){
        $idRol = $dbdata->id;
    }
    $dbdata->free();
    return $idRol;


  }
}

?>
