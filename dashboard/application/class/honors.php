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
        $dbdata->selectAdd("idReconocimiento,idTipoReconocimiento,idInstitucion,reconocimiento,descripcion,logo,tipoReconocimiento");
        $dbdata->whereAdd("idReconocimiento IN(".$this->honorsuser($data["idUsuario"]).")");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idReconocimiento = $dbdata->idReconocimiento;
          $ret[$contador]->idTipoReconocimiento = $dbdata->idTipoReconocimiento;
          $ret[$contador]->idInstitucion = $dbdata->idInstitucion;
          $ret[$contador]->reconocimiento =$dbdata->reconocimiento;
          $ret[$contador]->descripcion = $dbdata->descripcion;
          $ret[$contador]->logo = RUTADATA.$dbdata->logo;
          $ret[$contador]->tipoReconocimiento = $dbdata->tipoReconocimiento;
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

  private function honorsuser($idUsuario){
    $dbdata = DB_DataObject::Factory('ReconocimientoXUsuario');
    $dbdata->selectAdd();
    $dbdata->selectAdd("idReconocimiento");
    $dbdata->whereAdd("idUsuario='$idUsuario'");
    $dbdata->find();
      $contador=0;
    while( $dbdata->fetch() ){
      $ret[$contador] = $dbdata->idReconocimiento;
      $contador++;
    }
    $dbdata->free();
    $news = implode (",", $ret);
    return $news;
  }

}

?>
