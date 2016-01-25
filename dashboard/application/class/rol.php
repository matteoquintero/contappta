<?php
/**
*
*/
class Rol
{

	function __construct(){
	}

	public function ConsultarRol(){

		$dbdata = DB_DataObject::Factory('Rol');
		$dbdata->selectAdd("id,rol");
		$dbdata->whereAdd("id != 1");
		$dbdata->find();
		$contador=0;
		while( $dbdata->fetch() ){
				$ret[$contador]->id_rol = $dbdata->id;
				$ret[$contador]->rol = $dbdata->rol;
				$contador++;
		}
		$dbdata->free();
		return $ret;


	}
}

?>