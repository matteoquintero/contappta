<?php
class TipoDocumento{

	function __construct(){
	}

	public function get($modo,$data){

		$dbdata = DB_DataObject::Factory('TipoDocumento');
		$dbdata->selectAdd();

		switch ($modo) {

			case 'all':

				$dbdata->selectAdd("id,tipoDocumento,descripcion,iso");
				$dbdata->find();
				$contador=0;
				while( $dbdata->fetch() ){
						$ret[$contador]->idTipoDocumento = $dbdata->id;
						$ret[$contador]->tipoDocumento = format($dbdata->tipoDocumento,"encode");
						$ret[$contador]->descripcion = format($dbdata->descripcion,"encode");
						$ret[$contador]->iso = $dbdata->iso;
						$contador++;
				}
				$dbdata->free();

				return $ret;

			break;

		}

	}
}
