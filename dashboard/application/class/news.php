<?php

class News
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'institution':

        $dbdata = DB_DataObject::Factory('News');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idNoticia,idNotificacion,asunto,aprobada,fechaPublicacion,respuesta");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idNoticia = $dbdata->idNoticia;
          $ret[$contador]->idNotificacion = $dbdata->idNotificacion;
          $ret[$contador]->asunto = $dbdata->asunto;
          $ret[$contador]->aprobada = $dbdata->aprobada;
          $ret[$contador]->respuesta = $dbdata->respuesta;
          $ret[$contador]->fechaPublicacion = $dbdata->fechaPublicacion;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'publication':

        $dbdata = DB_DataObject::Factory('News');
        $dbdata->selectAdd();
        $dbdata->selectAdd("fechaPublicacion,idNoticia,idNotificacion");
        $dbdata->whereAdd("publicada = 'No'");
        $dbdata->whereAdd("aprobada = 'Si'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idNoticia = $dbdata->idNoticia;
          $ret[$contador]->idNotificacion = $dbdata->idNotificacion;
          $ret[$contador]->fechaPublicacion = $dbdata->fechaPublicacion;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'app':

        $dbdata = DB_DataObject::Factory('News');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idNoticia,asunto,aprobada,fechaPublicacion,respuesta,descripcion,foto,idPlantilla,media,mediaDescarga");
        $dbdata->whereAdd("aprobada='Si'");
        $dbdata->whereAdd("publicada='Si'");
        if($data["mode"]=="news"){
          $dbdata->whereAdd("idNoticia IN(".$this->newsreciver($data["idReceptor"]).")");
        }else if($data["mode"]=="new"){
          $dbdata->whereAdd("idNoticia='".($data["idNoticia"])."'");
        }
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->id = $dbdata->idNoticia;
          $ret[$contador]->title = $dbdata->asunto;
          $ret[$contador]->date = $dbdata->fechaPublicacion;
          $ret[$contador]->download = ( $dbdata->mediaDescarga != "" ) ? true : false;
          $ret[$contador]->mediaDescarga = $dbdata->mediaDescarga;
          $ret[$contador]->descriptionshort = substr($dbdata->descripcion."...", 0,250);
          $ret[$contador]->description = $dbdata->descripcion;
          $ret[$contador]->avatar = RUTADATA.$dbdata->foto;

          switch ($dbdata->idPlantilla) {
            case 2:
              $ret[$contador]->media = RUTADATA.$dbdata->media;
            break;
            case 3:
              $ret[$contador]->media = RUTADATA.$dbdata->media;
            break;
            case 4:
              $ret[$contador]->media = $dbdata->media;
            break;
          }

          $ret[$contador]->template = $dbdata->idPlantilla;
          $ret[$contador]->answer = ($dbdata->respuesta==="Si") ? true : false;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'one':

        $dbdata = DB_DataObject::Factory('News');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idNoticia,idNotificacion,idPlantilla,asunto,descripcion,media,aprobada,publicada,respuesta,fechaPublicacion");
        $dbdata->whereAdd("idNoticia='".$data['idNoticia']."'");
        $dbdata->find();
        if( $dbdata->fetch() ){
          $ret["idNoticia"] = $dbdata->idNoticia;
          $ret["idNotificacion"] = $dbdata->idNotificacion;
          $ret["idPlantilla"] = $dbdata->idPlantilla;
          $ret['asunto'] = format($dbdata->asunto,"encode");
          $ret['descripcion'] = format($dbdata->descripcion,"encode");
          $ret['aprobada'] = $dbdata->aprobada;
          $ret['publicada'] = $dbdata->publicada;
          $ret['respuesta'] = $dbdata->respuesta;
          $ret['media'] = $dbdata->media;
          $ret['fechaPublicacion'] = $dbdata->fechaPublicacion;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }

  private function newsreciver($reciver){
    $dbdata = DB_DataObject::Factory('NoticiaXReceptor');
    $dbdata->selectAdd();
    $dbdata->selectAdd("idNoticia");
    $dbdata->whereAdd("idReceptor='$reciver'");
    $dbdata->find();
      $contador=0;
    while( $dbdata->fetch() ){
      $ret[$contador] = $dbdata->idNoticia;
      $contador++;
    }
    $dbdata->free();
    $news = implode (",", $ret);
    return $news;
  }

}

?>
