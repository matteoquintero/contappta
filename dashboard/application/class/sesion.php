<?php

class Sesion extends Usuario{

    public function __construct() {

    }
    public function Autenticacion($usuario,$contrasena,$datos,$modo){

        ini_set("session.cookie_lifetime","7200");
        ini_set("session.gc_maxlifetime","7200");
        @session_start();
        switch ($modo) {

            case 'networks':
                $_SESSION['usuario'] = array(
                    'id' => $datos['idUsuario'],
                    'usuario' => $datos['usuario'],
                    'nombre' => $datos['nombre'],
                    'apellido' => $datos['apellido'],
                    'correo' => $datos['correo'],
                    'rol' => $datos['rol'],
                );
                $response[0]=true;
            break;

            case 'C247':
                if ( strtolower($usuario) == $datos['usuario'] && $contrasena == $datos['contrasena'] ) {
                    $_SESSION['usuario'] = array(
                        'id' => $datos['idUsuario'],
                        'usuario' => $datos['usuario'],
                        'nombre' => $datos['nombre'],
                        'apellido' => $datos['apellido'],
                        'correo' => $datos['correo'],
                        'rol' => $datos['rol'],
                    );
                    $response[0]=true;
                }else{ $response[0]=false; }
            break;

            default: $response[0]=false; break;

        }

        $redireccion=$this->Redireccion($response[0],$datos);
        $response[1]=$redireccion[0];
        $response[2]=$redireccion[1];
        return $response;

    }

    public function UsuarioLogeado() {

        @session_start();
        if (!isset($_SESSION['usuario'])) { return false; }
        if (!is_array($_SESSION['usuario'])) { return false; }
        if (empty($_SESSION['usuario']['id'])) { return false; }

        return true;
    }


    public function CerrarSesion() {
        @session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        unset($_SESSION['usuario']);
        unset($_SESSION['token']);
        session_destroy();
        session_write_close();
        session_destroy();
        header("Location: /");
        return true;
    }

    public function Redireccion($respuesta,$data){

        if ($respuesta == true) {

            $modo="demo";
            $demo=$this->get($modo,$data);

            if ($demo) { $resultado[0]=$data["usuario"]; }
            else{ $resultado[0]='tour'; }

            $this->ActualizarIngreso($data);

        }else{
           $resultado[0]='autenticacion';
           $resultado[1]='#message=31';
        }

        return $resultado;
    }

}

?>