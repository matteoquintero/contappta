<?php

class Usuario extends Users
{

	function __construct(){

	}

	public function create($data){
		$dbdata = DB_DataObject::Factory('Usuario');

    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->idGrupo=$data["idGrupo"];
    $dbdata->idRol=$data["idRol"];
    $dbdata->nombre=$data["nombre"];
    $dbdata->apellido=$data["apellido"];
    $dbdata->documento=$data["documento"];
    $dbdata->contrasena=$data["contrasena"];
    $dbdata->foto=$data["foto"];
    $dbdata->celular=$data["celular"];
		$correo=$data["correo"];
		$usuario=(empty($data["usuario"])) ? $data["nombre"] : $data["usuario"];
		$existsuser=$this->existsuser($usuario);
		if ($existsuser) { $usuario=$usuario."-".rand(2, 1000); }

		$existsemail=$this->existsemail($correo);
		if ($existsemail) { $correo=""; }

    $dbdata->usuario=$this->cleanuser($usuario);
		$dbdata->correo=$correo;
		$dbdata->find();

		if ($dbdata->fetch()) { $resultado[0] = false; } else {

			$resultado[0] = true;
			$resultado[1] = $dbdata->insert();
			$resultado[2] = $this->cleanuser($usuario);

		}

		$dbdata->free();

		return $resultado;

	}

	public function update($data){

    $dbdata = DB_DataObject::Factory('Usuario');
    $dbdata->idInstitucion=$data["idInstitucion"];
    $dbdata->idGrupo=$data["idGrupo"];
    $dbdata->idRol=$data["idRol"];
    $dbdata->nombre=$data["nombre"];
    $dbdata->apellido=$data["apellido"];
    $dbdata->documento=$data["documento"];
    $dbdata->foto=$data["foto"];
    $dbdata->celular=$data["celular"];

		$dbdata->whereAdd("id = '".$data["idUsuario"]."'");

		$dbdata->find();

		if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
      $resultado[0] = true;
		} else {
			$resultado[0] = false;
		}
    $resultado[1] = $data["idUsuario"];

		$dbdata->free();

		return $resultado;

	}

}

?>
