<?php

class Honors
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'institution':

        $dbdata = DB_DataObject::Factory('Honors');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idReconocimiento,reconocimiento,tipoReconocimiento,descripcion");
        $dbdata->whereAdd("idInstitucion = '".$data["idInstitucion"]."'");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idReconocimiento = $dbdata->idReconocimiento;
          $ret[$contador]->reconocimiento = $dbdata->reconocimiento;
          $ret[$contador]->tipoReconocimiento = $dbdata->tipoReconocimiento;
          $ret[$contador]->descripcion = $dbdata->descripcion;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'app':

        $dbdata = DB_DataObject::Factory('Honors');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idNoticia,asunto,aprobada,fechaPublicacion,respuesta,descripcion,foto,idPlantilla,media");
        $dbdata->whereAdd("aprobada='Si'");
        if($data["mode"]=="Honors"){
          $dbdata->whereAdd("idNoticia IN(".$this->Honorsreciver($data["idReceptor"]).")");
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
          $ret[$contador]->avatar = "http://localhost/contappta/dashboard/".$dbdata->foto;

          switch ($dbdata->idPlantilla) {
            case 1:
              $ret[$contador]->media = "http://localhost/contappta/dashboard/".$dbdata->media;
            break;
            case 2:
              $ret[$contador]->media = "http://localhost/contappta/dashboard/".$dbdata->media;
            break;
            case 3:
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

        $dbdata = DB_DataObject::Factory('Honors');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idReconocimiento,idTipoReconocimiento,reconocimiento,tipoReconocimiento,descripcion");
        $dbdata->whereAdd("idReconocimiento='".$data['idReconocimiento']."'");
        $dbdata->find();
        while( $dbdata->fetch() ){
          $ret["idReconocimiento"] = $dbdata->idReconocimiento;
          $ret["idTipoReconocimiento"] = $dbdata->idTipoReconocimiento;
          $ret["reconocimiento"] = $dbdata->reconocimiento;
          $ret['tipoReconocimiento'] = $dbdata->tipoReconocimiento;
          $ret['descripcion'] = $dbdata->descripcion;
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
