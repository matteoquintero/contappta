<?php

class Messages
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'all':

        $dbdata = DB_DataObject::Factory('Messages');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idMensaje,mensaje,media,fechaRegistro");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idMensaje = $dbdata->idMensaje;
          $ret[$contador]->mensaje = $dbdata->mensaje;
          $ret[$contador]->media = $dbdata->media;
          $ret[$contador]->fechaRegistro = $dbdata->fechaRegistro;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'app':

        $dbdata = DB_DataObject::Factory('Messages');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idMensaje,mensaje,media,fechaRegistro,foto,usuario,idEmisor,nombre,rol");

        if($data["mode"]=="transmitters"){
          $dbdata->groupBy('idEmisor');
          $dbdata->whereAdd("idMensaje IN(".$this->messagesreciver($data["idReceptor"]).")");
        }else if($data["mode"]=="transmitter"){
          $dbdata->whereAdd("idMensaje IN(".$this->messagesreciver($data["idReceptor"]).")");
          $dbdata->whereAdd("idEmisor='".($data["idEmisor"])."'");
        }

        $dbdata->find();
        $contador=0;

        while( $dbdata->fetch() ){
          $ret[$contador]->id = $dbdata->idEmisor;
          $ret[$contador]->name = $dbdata->nombre." (".$dbdata->rol.")";
          if (isset($dbdata->media)) {
            $ret[$contador]->media = "http://localhost/contappta/dashboard/".$dbdata->media;
            $ret[$contador]->data = true;
          }
          $ret[$contador]->description = $dbdata->mensaje;
          $ret[$contador]->date = $dbdata->fechaRegistro;
          $ret[$contador]->lastText = "...";

          $ret[$contador]->face = "http://localhost/contappta/dashboard/".$dbdata->foto;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'one':

        $dbdata = DB_DataObject::Factory('Messages');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idMensaje,mensaje,media,fechaRegistro");
        $dbdata->whereAdd("idMensaje=".$data['idMensaje']);
        $dbdata->find();
        while( $dbdata->fetch() ){
          $ret["idMensaje"] = $dbdata->idMensaje;
          $ret['mensaje'] = $dbdata->mensaje;
          $ret['media'] = $dbdata->media;
          $ret['fechaRegistro'] = $dbdata->fechaRegistro;
        }

        $dbdata->free();
        return $ret;

      break;

    }

  }

private function messagesreciver($reciver){
    $dbdata = DB_DataObject::Factory('MensajeXReceptor');
    $dbdata->selectAdd();
    $dbdata->selectAdd("idMensaje");
    $dbdata->whereAdd("idReceptor='$reciver'");
    $dbdata->find();
      $contador=0;
    while( $dbdata->fetch() ){
      $ret[$contador] = $dbdata->idMensaje;
      $contador++;
    }
    $dbdata->free();
    $messages = implode (",", $ret);
    return $messages;
}

}

?>
