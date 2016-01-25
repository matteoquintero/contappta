<?php

class FullMessages
{

	function __construct(){

	}

	public function get($modo,$data){

		switch ($modo) {

			case 'caso':

				$dbdata = DB_DataObject::Factory('FullMessages');
				$dbdata->selectAdd();
				$dbdata->selectAdd("idCaso,idEmisor,idReceptor,idUsuario,mensaje,fechaRegistro");
				$dbdata->whereAdd("idCaso =".$data["idCaso"]);
				$dbdata->find();
				$contador=0;
				while( $dbdata->fetch() ){
					$ret[$contador]->idCaso = $dbdata->idCaso;
					$ret[$contador]->idEmisor = $dbdata->idEmisor;
					$ret[$contador]->idReceptor = $dbdata->idReceptor;
					$datauser=$this->getuser($dbdata->idUsuario);
					$ret[$contador]->idUsuario = $datauser["idUsuario"];
					$ret[$contador]->usuario = $datauser["usuario"];
					$ret[$contador]->nombre = $datauser["nombre"];
					$ret[$contador]->apellido = $datauser["apellido"];
					$ret[$contador]->foto = $datauser["foto"];
					$ret[$contador]->mensaje = format($dbdata->mensaje);
					$ret[$contador]->fechaRegistro = date('d/m/y h:i A', strtotime($dbdata->fechaRegistro));
					$contador++;
				}

				$dbdata->free();
				return $ret;

			break;
		}


	}

	private function getuser($param){

		$dbdata = DB_DataObject::Factory('Usuario');
		$dbdata->selectAdd();
		$dbdata->selectAdd("usuario.id,usuario.usuario,usuario.nombre,usuario.apellido,usuario.foto");
		$dbdata->whereAdd("usuario.id =".$param);
		$dbdata->find();
		if( $dbdata->fetch() ){

			$ret['idUsuario'] = $dbdata->id;
			$ret['usuario'] = $dbdata->usuario;
			$ret['nombre'] = $dbdata->nombre;
			$ret['apellido'] = $dbdata->apellido;
			$ret['foto'] = format($dbdata->foto,"img");
		}
		$dbdata->free();
		return $ret;

	}

}

?>