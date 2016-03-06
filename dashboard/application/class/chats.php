<?php

class Chats
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'app-all':

        $dbdata = DB_DataObject::Factory('Chats');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idConversacion,mensaje,media,idUsuarioUno,usuarioUsuarioUno,rolUsuarioUno,fechaRegistro");
        $dbdata->selectAdd("fotoUsuarioUno,idUsuarioDos,usuarioUsuarioDos,rolUsuarioDos,fotoUsuarioDos");
        $dbdata->whereAdd("idConversacion IN(".$this->conversations($data["idUsuario"]).")");
        $dbdata->whereAdd("eliminado='no'");

        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idConversacion = $dbdata->idConversacion;
          $ret[$contador]->idMensaje = $dbdata->idMensaje;
          $ret[$contador]->mensaje = (empty($dbdata->media)) ? substr($dbdata->mensaje,0,15)."..." : "Nuevo archivo.";
          $ret[$contador]->media = $dbdata->media;

          if ($data["idUsuario"]==$dbdata->idUsuarioUno) {

            $ret[$contador]->idReceptor = $dbdata->idUsuarioUno;
            $ret[$contador]->usuarioReceptor = $dbdata->usuarioUsuarioUno;
            $ret[$contador]->rolReceptor = $dbdata->rolUsuarioUno;
            $ret[$contador]->fotoReceptor = RUTADATA.$dbdata->fotoUsuarioUno;

            $ret[$contador]->idEmisor = $dbdata->idUsuarioDos;
            $ret[$contador]->usuarioEmisor = $dbdata->usuarioUsuarioDos;
            $ret[$contador]->rolEmisor = $dbdata->rolUsuarioDos;
            $ret[$contador]->fotoEmisor = RUTADATA.$dbdata->fotoUsuarioDos;


          }else if ($data["idUsuario"]==$dbdata->idUsuarioDos){

            $ret[$contador]->idEmisor = $dbdata->idUsuarioUno;
            $ret[$contador]->usuarioEmisor = $dbdata->usuarioUsuarioUno;
            $ret[$contador]->rolEmisor = $dbdata->rolUsuarioUno;
            $ret[$contador]->fotoEmisor = RUTADATA.$dbdata->fotoUsuarioUno;

            $ret[$contador]->idReceptor = $dbdata->idUsuarioDos;
            $ret[$contador]->usuarioReceptor = $dbdata->usuarioUsuarioDos;
            $ret[$contador]->rolReceptor = $dbdata->rolUsuarioDos;
            $ret[$contador]->fotoReceptor = RUTADATA.$dbdata->fotoUsuarioDos;

          }

          $ret[$contador]->fechaRegistro = $dbdata->fechaRegistro;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }

  private function conversations($idUsuario){
    $dbdata = DB_DataObject::Factory('Conversacion');
    $dbdata->selectAdd();
    $dbdata->selectAdd("id");
    $dbdata->whereAdd("(idUsuarioUno='$idUsuario' OR idUsuarioDos='$idUsuario')");
    $dbdata->find();
      $contador=0;
    while( $dbdata->fetch() ){
      $ret[$contador] = $dbdata->id;
      $contador++;
    }
    $dbdata->free();
    $news = implode (",", $ret);
    return $news;
  }

}

?>
