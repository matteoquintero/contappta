<?php

class Sesion{

    public function __construct() {

    }
    public function authentication($usuario,$contrasena,$data,$modo){

        ini_set("session.cookie_lifetime","7200");
        ini_set("session.gc_maxlifetime","7200");
        @session_start();

        if ( strtolower($usuario) == $data['usuario'] && $contrasena == $data['contrasena'] ) {
            $_SESSION['usuario'] = array(
              'id' => $data['idUsuario'],
              'idInstitucion' => $data['idUsuario'],
              'usuario' => $data['usuario'],
              'nombre' => $data['nombre'],
              'apellido' => $data['apellido'],
              'permiso' => $data['permiso']
            );
            $response[0]=true;
        }else{ $response[0]=false; }

        $redirect=$this->redirect($response[0],$data);
        $response[1]=$redirect[0];
        $response[2]=$redirect[1];
        return $response;

    }

    public function loggeduser() {

        @session_start();
        if (!isset($_SESSION['usuario'])) { return false; }
        if (!is_array($_SESSION['usuario'])) { return false; }
        if (empty($_SESSION['usuario']['id'])) { return false; }

        return true;
    }


    public function unlogin() {
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

    public function redirect($logged,$data){

        if ($logged == true) {

            switch ($data["permiso"]) {
              case 'any':
                $response[0]='any/perfil';
              break;
              case 'app':
                $response[0]='app/perfil';
              break;
              case 'institution':
                $response[0]='institution/perfil';
              break;
            }


        }else{
           $response[0]='autenticacion';
           $response[1]='#message=31';
        }

        return $response;
    }

}

?>
