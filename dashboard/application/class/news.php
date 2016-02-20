<?php

class News
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'all':

        $dbdata = DB_DataObject::Factory('News');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idNoticia,asunto,aprobada,fechaPublicacion,respuesta");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idNoticia = $dbdata->idNoticia;
          $ret[$contador]->asunto = $dbdata->asunto;
          $ret[$contador]->aprobada = $dbdata->aprobada;
          $ret[$contador]->respuesta = $dbdata->respuesta;
          $ret[$contador]->fechaPublicacion = $dbdata->fechaPublicacion;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'app':

        $dbdata = DB_DataObject::Factory('News');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idNoticia,asunto,aprobada,fechaPublicacion,respuesta,descripcion,foto,idPlantilla,media");
        $dbdata->whereAdd("aprobada='Si'");
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
          $ret[$contador]->descriptionshort = substr($dbdata->descripcion."...", 0,50);
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
        $dbdata->selectAdd("idNoticia,idPlantilla,asunto,descripcion,media,aprobada,publicada,eliminada,respuesta,fechaPublicacion");
        $dbdata->whereAdd("idNoticia='".$data['idNoticia']."'");
        $dbdata->find();
        while( $dbdata->fetch() ){
          $ret["idNoticia"] = $dbdata->idNoticia;
          $ret["idPlantilla"] = $dbdata->idPlantilla;
          $ret['asunto'] = $dbdata->asunto;
          $ret['descripcion'] = $dbdata->descripcion;
          $ret['aprobada'] = $dbdata->aprobada;
          $ret['publicada'] = $dbdata->publicada;
          $ret['eliminada'] = $dbdata->eliminada;
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
