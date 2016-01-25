<?php

class Usuario
{

	function __construct(){

	}

	public function insert($data){

		$dbdata = DB_DataObject::Factory('Usuario');
		$dbdata->idRol=$data["idRol"];
		$dbdata->idPadre=$data["idPadre"];
		$dbdata->nombre=$data["nombre"];
		$dbdata->apellido=$data["apellido"];
		$usuario=$data["usuario"];

		if ($usuario == "" || $usuario == null || $usuario == " ") { $partsemail=explode("@",$data["correo"]); $usuario=$partsemail[0]; }
		if ($usuario == "" || $usuario == null || $usuario == " ") { $usuario=$data["nombre"]; }

		$data["usuario"]=$this->cleanuser($usuario);
		$correo=$data["correo"];

		$response=$this->get("user",$data);
		if ($response[0]) { $usuario=$usuario."_".rand(2, 1000); }

		$response=$this->get("email",$data);
		if ($response[0]) { $correo=""; }

		$dbdata->usuario=$this->cleanuser($usuario);
		$dbdata->foto=$data["foto"];
		$dbdata->contrasena=$data["contrasena"];
		$dbdata->find();

		if ($dbdata->fetch()) { $resultado[0] = false; } else {

			$resultado[0] = true;
			$resultado[1] = $dbdata->insert();
			$resultado[2] = $this->cleanuser($usuario);
			$data["usuario"]= $this->cleanuser($usuario);
			if ($data["activo"]=="No") { $this->sendemailconfirmation($data); }

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
				$dbdata->whereAdd("id =".$idUsuario);
				$dbdata->find();
				$user="";
				if( $dbdata->fetch() ){
					$user = $dbdata->usuario;
				}
				$dbdata->free();
				return $user;
	}

	public function get($modo,$data){
		switch ($modo) {

			case 'data':

				$dbdata = DB_DataObject::Factory('Usuario');
				$rol = DB_DataObject::Factory("Rol");
				$dbdata->selectAdd();
				$dbdata->selectAdd("usuario.id,usuario.usuario,usuario.nombre,usuario.apellido,rol.rol");
				$dbdata->whereAdd("usuario.id =".$data["idUsuario"]);
				$dbdata->joinAdd($rol);
				$dbdata->find();
				if( $dbdata->fetch() ){
					$ret['idUsuario'] = $dbdata->id;
					$ret['usuario'] = $dbdata->usuario;
					$ret['nombre'] = format($dbdata->nombre)." ".format($dbdata->apellido);
					$ret["rol"] = $dbdata->rol;
				}
				$dbdata->free();
				return $ret;

			break;

			case 'id':

				$dbdata = DB_DataObject::Factory('Usuario');
				$ciudad = DB_DataObject::Factory("Ciudad");
				$rol = DB_DataObject::Factory("Rol");
				$dbdata->selectAdd();
				$dbdata->selectAdd("usuario.id,usuario.usuario,usuario.nombre,usuario.apellido,usuario.documento,usuario.correo,usuario.telefono,usuario.celular,usuario.direccion,usuario.fechaNacimiento,usuario.contrasena,usuario.foto,ciudad.ciudad,rol.rol,rol.id as idRol");
				$dbdata->whereAdd("usuario.id =".$data["idUsuario"]);
				$dbdata->joinAdd($ciudad,"LEFT");
				$dbdata->joinAdd($rol);
				$dbdata->find();
				if( $dbdata->fetch() ){

					$ret['idUsuario'] = $dbdata->id;
					$ret['usuario'] = strtolower($dbdata->usuario);
					$ret['nombre'] = format($dbdata->nombre);
					$ret['apellido'] = format($dbdata->apellido);
					$ret['documento'] = $dbdata->documento;
					$ret['correo'] = $dbdata->correo;
					$ret['telefono'] = $dbdata->telefono;
					$ret['celular'] = $dbdata->celular;
					$ret['direccion'] = format($dbdata->direccion);
					$ret['fechaNacimiento'] = $dbdata->fechaNacimiento;
					$ret['contrasena'] = $dbdata->contrasena;
					$ret['ciudad'] = format($dbdata->ciudad,"encode");
					$ret['foto'] = format($dbdata->foto,"img");
					$ret['idRol'] = $dbdata->idRol;
					$ret["rol"] = $dbdata->rol;
					$ret["porcentaje"] = $this->percentagelack($data,"percentage");
				}
				$dbdata->free();
				return $ret;

			break;

			case 'visit':

				$dbdata = DB_DataObject::Factory('Usuario');
				$ciudad = DB_DataObject::Factory("Ciudad");
				$rol = DB_DataObject::Factory("Rol");
				$perfil = DB_DataObject::Factory("PerfilProfesional");
				$dbdata->selectAdd();
				$dbdata->selectAdd("usuario.id,usuario.usuario,usuario.nombre,usuario.apellido,usuario.documento,usuario.correo,usuario.telefono,usuario.celular,usuario.direccion,usuario.fechaNacimiento,usuario.contrasena,usuario.foto,ciudad.ciudad,rol.rol,rol.descripcion as descRol,rol.id as idRol,perfil_profesional.perfilProfesional");
				$dbdata->whereAdd("usuario = '".$data["usuario"]."'");
				$dbdata->joinAdd($ciudad,"LEFT");
				$dbdata->joinAdd($perfil,"LEFT");
				$dbdata->joinAdd($rol);
				$dbdata->find();
				if( $dbdata->fetch() ){

					$ret['idUsuario'] = $dbdata->id;
					$ret['usuario'] = strtolower($dbdata->usuario);
					$ret['nombre'] = format($dbdata->nombre);
					$ret['apellido'] = format($dbdata->apellido);
					$ret['documento'] = $dbdata->documento;
					$ret['correo'] = $dbdata->correo;
					$ret['telefono'] = $dbdata->telefono;
					$ret['celular'] = $dbdata->celular;
					$ret['direccion'] = format($dbdata->direccion);
					$ret['ciudad'] = format($dbdata->ciudad,"encode");
					$ret['foto'] = format($dbdata->foto,"img");
					$ret['idRol'] = $dbdata->idRol;
					$ret["rol"] = $dbdata->rol;
					$ret["descRol"] = $dbdata->descRol;
					$ret["perfilProfesional"] = $dbdata->perfilProfesional;
				}
				$dbdata->free();

				return $ret;

			break;


			case 'all':

				$dbdata = DB_DataObject::Factory('Usuario');
				$ciudad = DB_DataObject::Factory("Ciudad");
				$rol = DB_DataObject::Factory("Rol");
				$dbdata->selectAdd();
				$dbdata->selectAdd("usuario.id,usuario.usuario,usuario.nombre,usuario.apellido,usuario.documento,usuario.correo,usuario.telefono,usuario.celular,usuario.direccion,usuario.fechaNacimiento,usuario.contrasena,usuario.foto,ciudad.ciudad,rol.rol,rol.descripcion as descRol,rol.id as idRol");
				$dbdata->whereAdd("usuario = '".$data["usuario"]."'");
				$dbdata->joinAdd($ciudad,"LEFT");
				$dbdata->joinAdd($rol);
				$dbdata->find();
				if( $dbdata->fetch() ){

					$ret['idUsuario'] = $dbdata->id;
					$ret['usuario'] = strtolower($dbdata->usuario);
					$ret['nombre'] = format($dbdata->nombre);
					$ret['apellido'] = format($dbdata->apellido);
					$ret['documento'] = $dbdata->documento;
					$ret['correo'] = $dbdata->correo;
					$ret['telefono'] = $dbdata->telefono;
					$ret['celular'] = $dbdata->celular;
					$ret['direccion'] = format($dbdata->direccion);
					$ret['fechaNacimiento'] = $dbdata->fechaNacimiento;
					$ret['contrasena'] = $dbdata->contrasena;
					$ret['ciudad'] = format($dbdata->ciudad,"encode");
					$ret['foto'] = format($dbdata->foto,"img");
					$ret['idRol'] = $dbdata->idRol;
					$ret["rol"] = $dbdata->rol;
					$ret["descRol"] = $dbdata->descRol;
					$ret["porcentaje"] = $this->percentagelack($data,"percentage");
				}
				$dbdata->free();

				return $ret;

			break;

			case 'son':

				$dbdata = DB_DataObject::Factory('Usuario');
				$parentesco = DB_DataObject::Factory("Parentesco");
				$dbdata->selectAdd();
				$dbdata->selectAdd("usuario.id,usuario.usuario,usuario.nombre,usuario.apellido,usuario.foto,usuario.documento,usuario.correo,usuario.celular,usuario.fechaNacimiento,parentesco.id As idParentesco,parentesco.parentesco");
				$dbdata->whereAdd("idPadre = '".$data["idUsuario"]."'");
				$dbdata->joinAdd($parentesco);
				$dbdata->find();
				$contador=0;
				while( $dbdata->fetch() ){
					$ret[$contador]->idHijo = $dbdata->id;
					$ret[$contador]->usuario = strtolower($dbdata->usuario);
					$ret[$contador]->nombre = $dbdata->nombre;
					$ret[$contador]->apellido = $dbdata->apellido;
					$ret[$contador]->foto = format($dbdata->foto,"img");
					$ret[$contador]->documento = $dbdata->documento;
					$ret[$contador]->correo = $dbdata->correo;
					$ret[$contador]->celular = $dbdata->celular;
					$ret[$contador]->fechaNacimiento = $dbdata->fechaNacimiento;
					$ret[$contador]->idParentesco = $dbdata->idParentesco;
					$ret[$contador]->parentesco = $dbdata->parentesco;
					$contador++;
				}
				$dbdata->free();
				$resultado[0]=$ret;
				$resultado[1]=$contador;
				return $resultado;

			break;

			case 'summary':

				$dbdata = DB_DataObject::Factory('Usuario');
				$parentesco = DB_DataObject::Factory("Parentesco");
				$dbdata->selectAdd();
				$dbdata->selectAdd("usuario.nombre,usuario.apellido,usuario.correo,usuario.telefono,usuario.celular,parentesco.parentesco");
				$dbdata->joinAdd($parentesco,"LEFT");
				switch ($data["rol"]) {
					case 'user':
						$dbdata->whereAdd("usuario.id = '".$data["idReceptor"]."'");
					break;
					case 'lawyer':
						$dbdata->whereAdd("usuario.id = '".$data["idEmisor"]."'");
					break;
				}

				$dbdata->find();
				if( $dbdata->fetch() ){
					$resultado["nombreUsuario"]=$dbdata->nombre." ".$dbdata->apellido;
					$resultado["correo"]=$dbdata->correo;
					$resultado["telefono"]=$dbdata->telefono;
					$resultado["celular"]=$dbdata->celular;
					$resultado["parentesco"]=($dbdata->parentesco != "") ? $dbdata->parentesco : 'Titular';
				}else{
					$resultado=false;
				}
				$dbdata->free();
				return $resultado;

			break;

			case 'email':

				$dbdata = DB_DataObject::Factory('Usuario');
				$dbdata->selectAdd();
				$dbdata->selectAdd("usuario,nombre");
				$dbdata->whereAdd("correo = '".$data["correo"]."'");
				$dbdata->whereAdd("correo != '".$data["correosesion"]."'");
				$dbdata->find();
				if( $dbdata->fetch() ){
					$resultado[0]=true;
					$resultado['usuario']=$dbdata->usuario;
					$resultado['nombre']=$dbdata->nombre;
				}else{
					$resultado[0]=false;
				}
				$dbdata->free();
				return $resultado;

			break;

			case 'user':

				$dbdata = DB_DataObject::Factory('Usuario');
				$dbdata->selectAdd();
				$dbdata->selectAdd("lower(usuario)");
				$dbdata->whereAdd("usuario = '".strtolower($data["usuario"])."'");
				$dbdata->whereAdd("usuario != '".strtolower($data["usuariosesion"])."'");
				$dbdata->find();
				$resultado[0]=($dbdata->fetch()) ? true : false;
				return $resultado;

			break;

			case 'visit':

				$dbdata = DB_DataObject::Factory('Usuario');
				$dbdata->selectAdd();
				$dbdata->selectAdd("lower(usuario)");
				$dbdata->whereAdd("usuario = '".strtolower($data["usuario"])."'");
				$dbdata->whereAdd("usuario != '".strtolower($data["usuariosesion"])."'");
				$dbdata->find();
				$resultado[0]=($dbdata->fetch()) ? "allow" : "block";
				return $resultado;

			break;

			case 'emisor':

				$dbdata = DB_DataObject::Factory('Usuario');
				$dbdata->selectAdd();
				$dbdata->selectAdd("usuario");
				$dbdata->whereAdd("id = '".$data["idEmisor"]."'");
				$dbdata->find();
				if( $dbdata->fetch() ){
					$usuario=$dbdata->usuario;
				}
				$dbdata->free();
				return $usuario;

			break;

			case 'caso':

				$dbdata = DB_DataObject::Factory('Usuario');
				$dbdata->selectAdd();
				$dbdata->selectAdd("caso");
				$dbdata->whereAdd("usuario = '".$data["usuario"]."'");
				$dbdata->find();
				$dbdata->fetch();
				$response=($dbdata->caso=="Si") ? true : false;
				$dbdata->free();
				return $response;

			break;

			case 'demo':

				$dbdata = DB_DataObject::Factory('Usuario');
				$dbdata->selectAdd();
				$dbdata->selectAdd("demo");
				$dbdata->whereAdd("usuario = '".$data["usuario"]."'");
				$dbdata->find();
				$dbdata->fetch();
				$response=($dbdata->demo=="Si") ? true : false;
				$dbdata->free();
				return $response;

			break;

			case 'sesion':

				$rol = DB_DataObject::Factory("Rol");
				$ciudad = DB_DataObject::Factory("Ciudad");
				$dbdata = DB_DataObject::Factory('Usuario');
				$dbdata->selectAdd();
				$dbdata->selectAdd("usuario.id,usuario.usuario,usuario.foto,usuario.nombre,usuario.apellido,usuario.correo,usuario.contrasena,rol.rol,rol.id as idRol,ciudad.ciudad,ciudad.id as idCiudad");
				$dbdata->whereAdd("usuario = '".$data["usuario"]."'");
				$dbdata->joinAdd($rol);
				$dbdata->joinAdd($ciudad,"LEFT");
				$dbdata->find();
				while( $dbdata->fetch() ){
					$ret["idUsuario"] = $dbdata->id;
					$ret["usuario"] = strtolower($dbdata->usuario);
					$ret["foto"] = format($dbdata->foto,"img");
					$ret["nombre"] = $dbdata->nombre;
					$ret["apellido"] = $dbdata->apellido;
					$ret["correo"] = $dbdata->correo;
					$ret["contrasena"] = $dbdata->contrasena;
					$ret["idRol"] = $dbdata->idRol;
					$ret["rol"] = $dbdata->rol;
					$ret["idCiudad"] = $dbdata->idCiudad;
					$ret["ciudad"] = format($dbdata->ciudad,"encode");
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
