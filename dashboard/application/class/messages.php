<?php

class Messages
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'institution':

        $dbdata = DB_DataObject::Factory('Messages');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idMensaje,mensaje,nombreEmisor,nombreReceptor,media,fechaRegistro,visto");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");

        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idMensaje = $dbdata->idMensaje;
          $ret[$contador]->mensaje = $dbdata->mensaje;
          $ret[$contador]->nombreEmisor = $dbdata->nombreEmisor;
          $ret[$contador]->nombreReceptor = $dbdata->nombreReceptor;
          $ret[$contador]->media = $dbdata->media;
          $ret[$contador]->visto = $dbdata->visto;
          $ret[$contador]->fechaRegistro = $dbdata->fechaRegistro;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;


      case 'conversation':

        $dbdata = DB_DataObject::Factory('Messages');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idMensaje,mensaje,media,nombreEmisor,fechaRegistro");
        $dbdata->whereAdd("idConversacion='".($data["idConversacion"])."'");
        $dbdata->orderBy("fechaRegistro desc");

        $dbdata->find();
        $contador=0;

        while( $dbdata->fetch() ){
          if (isset($dbdata->media)) {
            $ret[$contador]->media = RUTADATA.$dbdata->media;
            $ret[$contador]->data = true;
          }
          $ret[$contador]->idMensaje = $dbdata->idMensaje;
          $ret[$contador]->mensaje = $dbdata->mensaje;
          $ret[$contador]->nombre = $dbdata->nombreEmisor;
          $ret[$contador]->fechaRegistro = $dbdata->fechaRegistro;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'one':

        $dbdata = DB_DataObject::Factory('Messages');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idMensaje,mensaje,media,fechaRegistro");
        $dbdata->whereAdd("idMensaje='".$data['idMensaje']."'");
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


}

?>
