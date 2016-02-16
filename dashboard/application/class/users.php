<?php

class Users
{

	function __construct(){

	}

	public function getmail($idUsuario){
		$dbdata = DB_DataObject::Factory('Users');
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
		$dbdata = DB_DataObject::Factory('Users');
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
    $dbdata = DB_DataObject::Factory('Users');
    $dbdata->whereAdd("correo='$email'");
    $dbdata->find();
    if( $dbdata->fetch() ){
      return true;
    }else{
      return false;
    }
    $dbdata->free();
  }

  public function existsuser($user){
    $dbdata = DB_DataObject::Factory('Users');
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

      case 'app':

        $dbdata = DB_DataObject::Factory('Users');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idUsuario,idRol,idInstitucion,idGrupo,nombre,permiso");
        $dbdata->selectAdd("apellido,foto,celular,usuario,correo,documento,permiso");
        $dbdata->selectAdd("rol,institucion,grado,identificador");
        $dbdata->whereAdd("idUsuario = '".$data["idUsuario"]."'");
        $dbdata->find();

        if( $dbdata->fetch() ){
          $ret['idUsuario'] = $dbdata->idUsuario;
          $ret['idRol'] = $dbdata->idRol;
          $ret['idInstitucion'] = $dbdata->idInstitucion;
          $ret['idGrupo'] = $dbdata->idGrupo;
          $ret['nombre'] = $dbdata->nombre;
          $ret['apellido'] = $dbdata->apellido;
          $ret['foto'] = "http://localhost/contappta/dashboard/".$dbdata->foto;
          $ret['celular'] = $dbdata->celular;
          $ret['usuario'] = $dbdata->usuario;
          $ret['correo'] = $dbdata->correo;
          $ret['documento'] = $dbdata->documento;
          $ret['permiso'] = $dbdata->permiso;
          $ret['rol'] = $dbdata->rol;
          $ret['institucion'] = $dbdata->institucion;
          $ret['grado'] = $dbdata->grado;
          $ret['identificador'] = $dbdata->identificador;

        }
        $dbdata->free();
        return $ret;

      break;

      case 'group':


        $dbdata = DB_DataObject::Factory('Users');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idUsuario,idRol,idInstitucion,idGrupo,nombre,permiso");
        $dbdata->selectAdd("apellido,foto,celular,usuario,correo,documento,permiso");
        $dbdata->selectAdd("rol,institucion,grado,identificador");
        $dbdata->whereAdd("idGrupo = '".$data["idGrupo"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
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
          $ret[$contador]->permiso = $dbdata->permiso;
          $ret[$contador]->rol = $dbdata->rol;
          $ret[$contador]->institucion = $dbdata->institucion;
          $ret[$contador]->grado = $dbdata->grado;
          $ret[$contador]->identificador = $dbdata->identificador;
          $contador++;
        }
        $dbdata->free();
        return $ret;

      break;

      case 'institution':

        $dbdata = DB_DataObject::Factory('Users');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idUsuario,idRol,idInstitucion,idGrupo,nombre,permiso");
        $dbdata->selectAdd("apellido,foto,celular,usuario,correo,documento,permiso");
        $dbdata->selectAdd("rol,institucion,grado,identificador");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");
        $dbdata->find();

        $contador=0;

        while( $dbdata->fetch() ){
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
          $ret[$contador]->permiso = $dbdata->permiso;
          $ret[$contador]->rol = $dbdata->rol;
          $ret[$contador]->institucion = $dbdata->institucion;
          $ret[$contador]->grado = $dbdata->grado;
          $ret[$contador]->identificador = $dbdata->identificador;
          $contador++;
        }
        $dbdata->free();
        return $ret;

      break;

      case 'guardian':

        $dbdata = DB_DataObject::Factory('Users');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idUsuario,idRol,idInstitucion,idGrupo,nombre,permiso");
        $dbdata->selectAdd("apellido,foto,celular,usuario,correo,documento,permiso");
        $dbdata->selectAdd("rol,institucion,grado,identificador");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");
        $dbdata->whereAdd("idRol = 1 OR idRol = 2");
        $dbdata->find();

        $contador=0;

        while( $dbdata->fetch() ){
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
          $ret[$contador]->permiso = $dbdata->permiso;
          $ret[$contador]->rol = $dbdata->rol;
          $ret[$contador]->institucion = $dbdata->institucion;
          $ret[$contador]->grado = $dbdata->grado;
          $ret[$contador]->identificador = $dbdata->identificador;
          $contador++;
        }
        $dbdata->free();
        return $ret;

      break;

      case 'guardiansson':

        $dbdata = DB_DataObject::Factory('Users');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idUsuario,idRol,idInstitucion,idGrupo,nombre,permiso");
        $dbdata->selectAdd("apellido,foto,celular,usuario,correo,documento,permiso");
        $dbdata->selectAdd("rol,institucion,grado,identificador");
        $dbdata->whereAdd("idUsuario IN(".$this->guardiansson($data["idHijo"]).")");
        $dbdata->find();

        $contador=0;

        while( $dbdata->fetch() ){
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
          $ret[$contador]->permiso = $dbdata->permiso;
          $ret[$contador]->rol = $dbdata->rol;
          $ret[$contador]->institucion = $dbdata->institucion;
          $ret[$contador]->grado = $dbdata->grado;
          $ret[$contador]->identificador = $dbdata->identificador;
          $contador++;
        }
        $dbdata->free();
        return $ret;

      break;

      case 'one':

        $dbdata = DB_DataObject::Factory('Users');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idUsuario,idRol,idInstitucion,idGrupo,nombre,permiso");
        $dbdata->selectAdd("apellido,foto,celular,usuario,correo,documento,permiso");
        $dbdata->selectAdd("rol,institucion,grado,identificador");
        $dbdata->whereAdd("idUsuario = '".$data["idUsuario"]."'");
        $dbdata->find();

        if( $dbdata->fetch() ){
          $ret['idUsuario'] = $dbdata->idUsuario;
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
          $ret['permiso'] = $dbdata->permiso;
          $ret['rol'] = $dbdata->rol;
          $ret['institucion'] = $dbdata->institucion;
          $ret['grado'] = $dbdata->grado;
          $ret['identificador'] = $dbdata->identificador;

        }
        $dbdata->free();
        return $ret;

      break;

			case 'all':
        $dbdata = DB_DataObject::Factory('Users');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idUsuario,idRol,idInstitucion,idGrupo,nombre,permiso");
        $dbdata->selectAdd("apellido,foto,celular,usuario,correo,documento,permiso");
        $dbdata->selectAdd("rol,institucion,grado,identificador");
        $dbdata->whereAdd("idUsuario = '".$data["idUsuario"]."'");
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
          $ret[$contador]->permiso = $dbdata->permiso;
          $ret[$contador]->rol = $dbdata->rol;
          $ret[$contador]->institucion = $dbdata->institucion;
          $ret[$contador]->grado = $dbdata->grado;
          $ret[$contador]->identificador = $dbdata->identificador;
          $contador++;
        }
        $dbdata->free();
				return $ret;

			break;

			case 'sesion':

        $dbdata = DB_DataObject::Factory('Users');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idUsuario,idRol,idInstitucion,usuario,contrasena,permiso");
        $dbdata->whereAdd("usuario = '".$data["usuario"]."'");
        $dbdata->find();

        if( $dbdata->fetch() ){
          $ret['idUsuario'] = $dbdata->idUsuario;
          $ret['idRol'] = $dbdata->idRol;
          $ret['idInstitucion'] = $dbdata->idInstitucion;
          $ret['usuario'] = $dbdata->usuario;
          $ret['contrasena'] = $dbdata->contrasena;
          $ret['permiso'] = $dbdata->permiso;
        }
        $dbdata->free();
        return $ret;

			break;
		}

	}

  private function guardiansson($son){
    $dbdata = DB_DataObject::Factory('acudiente');
    $dbdata->selectAdd();
    $dbdata->selectAdd("idAcudiente");
    $dbdata->whereAdd("idHijo='$son'");
    $dbdata->find();
      $contador=0;
    while( $dbdata->fetch() ){
      $ret[$contador] = $dbdata->idAcudiente;
      $contador++;
    }
    $dbdata->free();
    $guardians = implode (",", $ret);
    return $guardians;
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