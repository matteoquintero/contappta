<?php

class Usuario
{

	function __construct(){

	}

	public function insert($data){
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
    $dbdata->nombre=$data["nombre"];
    $dbdata->apellido=$data["apellido"];
    $dbdata->contrasena=$data["contrasena"];
    $dbdata->foto=$data["foto"];

		$dbdata->whereAdd("usuario = '".$data["usuario"]."'");

		$dbdata->find();

		if ($dbdata->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
			$resultado[0] = true;
		} else {
			$resultado[0] = false;
		}

		$dbdata->free();

		return $resultado;

	}

	public function getmail($idUsuario){
				$dbdata = DB_DataObject::Factory('Usuario');
				$dbdata->whereAdd("id =".$idUsuario);
				$dbdata->find();
				$mail="";
				if( $dbdata->fetch() ){
					$mail= $dbdata->correo;
				}
				$dbdata->free();
				return $mail;
	}

	public function getuser($idUsuario){
				$dbdata = DB_DataObject::Factory('Usuario');
				$dbdata->whereAdd("id = ".$idUsuario);
				$dbdata->find();
				$user="";
				if( $dbdata->fetch() ){
					$user = $dbdata->usuario;
				}
				$dbdata->free();
				return $user;
	}

  public function existsemail($email){
    $dbdata = DB_DataObject::Factory('Usuario');
    $dbdata->whereAdd("correo='$email' ");
    $dbdata->find();
    if( $dbdata->fetch() ){
      return true;
    }else{
      return false;
    }
    $dbdata->free();
  }

  public function existsuser($user){
    $dbdata = DB_DataObject::Factory('Usuario');
    $dbdata->whereAdd(" usuario='$user' ");
    $dbdata->find();
    if( $dbdata->fetch() ){
      return true;
    }else{
      return false;
    }
    $dbdata->free();
  }


	public function get($modo,$data){
		switch ($modo) {

      case 'institution':

        $dbdata = DB_DataObject::Factory('Usuario');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,nombre,apellido,usuario");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");
        $dbdata->find();
        $contador=0;
        if( $dbdata->fetch() ){
          $ret[$contador]->idUsuario = $dbdata->id;
          $ret[$contador]->nombre = $dbdata->nombre." ". $dbdata->apellido;;
          $ret[$contador]->usuario = $dbdata->usuario;
          $contador++;
        }
        $dbdata->free();
        return $ret;

      break;

      case 'guardian':

        $dbdata = DB_DataObject::Factory('Usuario');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,idRol,idInstitucion,idGrupo,nombre,apellido,contrasena,foto,celular,usuario,correo,documento");
        $dbdata->whereAdd("idRol = 3 OR idRol = 4");
        $dbdata->find();
        $contador=0;
        if( $dbdata->fetch() ){
          $ret[$contador]->idUsuario = $dbdata->id;
          $ret[$contador]->idRol = $dbdata->idRol;
          $ret[$contador]->idInstitucion = $dbdata->idInstitucion;
          $ret[$contador]->idGrupo = $dbdata->idGrupo;
          $ret[$contador]->nombre = $dbdata->nombre;
          $ret[$contador]->apellido = $dbdata->apellido;
          $ret[$contador]->foto = $dbdata->foto;
          $ret[$contador]->celular = $dbdata->celular;
          $ret[$contador]->usuario = $dbdata->usuario;
          $ret[$contador]->correo = $dbdata->correo;
          $contador++;
        }
        $dbdata->free();
        return $ret;

      break;

      case 'one':

        $dbdata = DB_DataObject::Factory('Usuario');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,idRol,idInstitucion,idGrupo,nombre,apellido,foto,celular,usuario,correo,documento");
        $dbdata->whereAdd("id = '".$data["idUsuario"]."'");
        $dbdata->find();

        if( $dbdata->fetch() ){
          $ret['idUsuario'] = $dbdata->id;
          $ret['idRol'] = $dbdata->idRol;
          $ret['idInstitucion'] = $dbdata->idInstitucion;
          $ret['idGrupo'] = $dbdata->idGrupo;
          $ret['nombre'] = $dbdata->nombre;
          $ret['apellido'] = $dbdata->apellido;
          $ret['foto'] = $dbdata->foto;
          $ret['celular'] = $dbdata->celular;
          $ret['usuario'] = $dbdata->usuario;
          $ret['correo'] = $dbdata->correo;
          $ret['documento'] = $dbdata->documento;
        }
        $dbdata->free();
        return $ret;

      break;

			case 'all':
        $dbdata = DB_DataObject::Factory('Usuario');
        $rol = DB_DataObject::Factory('Rol');
        $institucion = DB_DataObject::Factory('Institucion');
				$grupo = DB_DataObject::Factory('Grupo');
        $dbdata->selectAdd();
        $dbdata->selectAdd("usuario.id as idUsuario,usuario.idRol,usuario.idInstitucion,usuario.idGrupo,usuario.nombre,usuario.apellido,usuario.foto,usuario.celular,usuario.usuario,usuario.correo,usuario.documento");
        $dbdata->selectAdd("rol.rol,institucion.institucion,grupo.grado,grupo.identificador");
        $dbdata->joinAdd($rol);
        $dbdata->joinAdd($institucion);
        $dbdata->joinAdd($grupo,"left");
        $dbdata->find();

        $contador=0;

        if( $dbdata->fetch() ){
          $ret[$contador]->idUsuario = $dbdata->idUsuario;
          $ret[$contador]->idRol = $dbdata->idRol;
          $ret[$contador]->idInstitucion = $dbdata->idInstitucion;
          $ret[$contador]->idGrupo = $dbdata->idGrupo;
          $ret[$contador]->nombre = $dbdata->nombre;
          $ret[$contador]->apellido = $dbdata->apellido;
          $ret[$contador]->foto = $dbdata->foto;
          $ret[$contador]->celular = $dbdata->celular;
          $ret[$contador]->usuario = $dbdata->usuario;
          $ret[$contador]->correo = $dbdata->correo;
          $ret[$contador]->documento = $dbdata->documento;
          $ret[$contador]->rol = $dbdata->rol;
          $ret[$contador]->institucion = $dbdata->institucion;
          $ret[$contador]->grupo = $dbdata->grupo;
          $ret[$contador]->identificador = $dbdata->identificador;
          $contador++;
        }
        $dbdata->free();
				return $ret;

			break;

			case 'sesion':

        $dbdata = DB_DataObject::Factory('Usuario');
        $dbdata->selectAdd();
        $dbdata->selectAdd("id,idInstitucion,nombre,apellido,foto,usuario,contrasena,permiso");
        $dbdata->whereAdd("usuario = '".$data["usuario"]."'");
        $dbdata->find();

        if( $dbdata->fetch() ){
          $ret['idUsuario'] = $dbdata->id;
          $ret['idInstitucion'] = $dbdata->idInstitucion;
          $ret['nombre'] = $dbdata->nombre;
          $ret['apellido'] = $dbdata->apellido;
          $ret['foto'] = $dbdata->foto;
          $ret['usuario'] = $dbdata->usuario;
          $ret['contrasena'] = $dbdata->contrasena;
          $ret['permiso'] = $dbdata->permiso;
        }
        $dbdata->free();
        return $ret;

			break;
		}

	}

	function cleanuser($user){
		$newuser=str_replace(array('_','.','-'," ","+"),"",$user);
		$response=substr($newuser, 0, 16);
		$response=strtolower($response);
		$response=spaces($response);
		return $response;
	}

}

?>
