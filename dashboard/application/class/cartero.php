<?php
class Cartero extends Notificacion
{

	function __construct(){

	}

	public function newcarte($data,$message){

		//Obtner datos persona que ejecuta la accion.
		$mode=($data["idUsuario"]==$data["idEmisor"]) ? "notficatione" : (($data["idUsuario"]==$data["idReceptor"]) ? "notficationr" : "error");
		$datauseraction=$this->getdatauser($mode,$data);

		//Obtner datos persona que recibe la notificacion de una accion.
		$mode=($data["idUsuario"]==$data["idEmisor"]) ? "notficationr" : (($data["idUsuario"]==$data["idReceptor"]) ? "notficatione" : "error");
		$datausersent=$this->getdatauser($mode,$data);

		$datacase=$this->getdatacase($data);

		switch ($message) {
				case 0:
           			 $data['notificacion']="Se ha subido un nuevo archivo.";
           			 $data['descripcion']=" El caso <i>".$datacase["nombre"]."</i> tiene un nuevo archivo disponible para descargar.";
				break;
				case 1:
           			 $data['notificacion']="Caso calificado - ".$datacase["nombre"].".";
           			 $data['descripcion']="El usuario ".$datauseraction[0]->usuario." ha calificado con: ".$data["calificacion"];
				break;
				case 2:
           			 $data['notificacion']="Caso nuevo - ".$datacase["nombre"].".";
           			 $data['descripcion']="El usuario ".$datauseraction[0]->usuario." ha creado un caso nuevo <br><i>".$datacase["nombre"]."</i>.<br> <br>".$datacase["descripcion"];
				break;
				case 3:
           			 $data['notificacion']="Caso ".$datacase["nombre"]." en proceso.";
           			 $data['descripcion']="El caso <i>".$datacase["nombre"]."</i> ya fue asignado al abogado (".$datauseraction[0]->usuario.") para atender su caso.";
				break;
				case 4:
           			 $data['notificacion']="Caso ".$datacase["nombre"]." actualizado.";
           			 $data['descripcion']="Estas son las recomendaciones para su caso: <br>".$data["recomendaciones"];
				break;
				case 5:
           			 $data['notificacion']="Caso ".$datacase["nombre"]." (".$datacase["estado"].").";
		            switch ($datacase["idEstado"]) {
		                case 1:
		                    $data['descripcion']="El caso <i>".$datacase["nombre"]."</i> ya recibi&oacute; asesor&iacute;a por parte del abogado (".$datauseraction[0]->usuario.") y ha sido creado.";
		                break;
		                case 2:
		                    $data['descripcion']="El caso <i>".$datacase["nombre"]."</i> ya recibi&oacute; asesor&iacute;a por parte del abogado (".$datauseraction[0]->usuario.") y est&aacute; atendiendo su caso.";
		                break;
		                case 3:
		                    $data['descripcion']="El caso <i>".$datacase["nombre"]."</i> ya recibi&oacute; asesor&iacute;a por parte del abogado (".$datauseraction[0]->usuario.") y ha sido cancelado.";
		                break;
		                case 4:
		                    $data['descripcion']="El caso <i>".$datacase["nombre"]."</i> ya recibi&oacute; asesor&iacute;a por parte del abogado (".$datauseraction[0]->usuario.") y ha sido cerrado.";
		                break;
		                case 6:
		                    $data['descripcion']="El caso <i>".$datacase["nombre"]."</i> ya recibi&oacute; asesor&iacute;a por parte del abogado (".$datauseraction[0]->usuario.") y esta en conversi&oacute;n";
		                break;
		                case 7:
		                    $data['descripcion']="El caso <i>".$datacase["nombre"]."</i> ya recibi&oacute; asesor&iacute;a por parte del abogado (".$datauseraction[0]->usuario.") y esta pendiente de datos.";
		                break;
		            }
				break;

		}
    $this->insert($data,$datausersent);
	}

	public function getdatauser($mode,$data){


			$dbdata = DB_DataObject::Factory('Usuario');
			$dbdata->selectAdd();
			$dbdata->selectAdd("usuario,nombre,apellido,correo");

			switch($mode){

				case 'notficatione':
					$dbdata->whereAdd("id = '".$data['idEmisor']."'");
				break;

				case 'notficationr':
					if ($data["idReceptor"]!="") {
						$dbdata->whereAdd("id = '".$data["idReceptor"]."'");
					}else{
						$dbdata->whereAdd("idRol = 2");
					}
				break;

				case 'error': $dbdata->whereAdd("id = 341"); break;
				default: $dbdata->whereAdd("id = 341"); break;

			}

			$dbdata->find();
			$contador=0;
			while( $dbdata->fetch() ){
				$resultado[$contador]->usuario=$dbdata->usuario;
				$resultado[$contador]->nombre=$dbdata->nombre." ".$dbdata->apellido;
				$resultado[$contador]->correo=$dbdata->correo;
				$contador++;
			}
			$dbdata->free();


		return $resultado;
	}

	public function getdatacase($data){

				$dbdata = DB_DataObject::Factory('Fullcases');
				$dbdata->selectAdd();
				$dbdata->selectAdd("idCaso,numeroRegistro,nombre,descripcion,fechaRegistro,categoria,estado,origen,recomendaciones,idEmisor,idReceptor,idTipoCaso,idEstado");
				$dbdata->whereAdd("idCaso = '".$data["idCaso"]."'");
				$dbdata->find();
				if( $dbdata->fetch() ){
					$ret["idCaso"]=$dbdata->idCaso;
					$ret["numeroRegistro"]=$dbdata->numeroRegistro;
					$ret["nombre"]=format($dbdata->nombre);
					$ret["descripcion"]=format($dbdata->descripcion);
					$ret["fechaRegistro"]=$dbdata->fechaRegistro;
					$ret["categoria"]=format($dbdata->categoria);
					$ret["estado"]=format($dbdata->estado);
					$ret["origen"]=format($dbdata->origen);
					$ret["recomendaciones"]=format($dbdata->recomendaciones);
					$ret["idEmisor"]=$dbdata->idEmisor;
					$ret["idReceptor"]=$dbdata->idReceptor;
					$ret["idTipoCaso"]=$dbdata->idTipoCaso;
					$ret["idEstado"]=$dbdata->idEstado;
				}else{
					$ret=false;
				}

				$dbdata->free();
				return $ret;

	}

}
?>