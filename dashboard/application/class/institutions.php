<?php

class Institutions
{

	function __construct(){

	}

  public function get($modo,$data){

    switch ($modo) {

      case 'all':

        $dbdata = DB_DataObject::Factory('Institutions');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idInstitucion,activo,institucion,correo,direccion,logo,idTipoInstitucion,tipoInstitucion");
        $dbdata->find();
        $contador=0;
        while( $dbdata->fetch() ){
          $ret[$contador]->idInstitucion = $dbdata->idInstitucion;
          $ret[$contador]->activo = $dbdata->activo;
          $ret[$contador]->institucion = $dbdata->institucion;
          $ret[$contador]->correo = $dbdata->correo;
          $ret[$contador]->direccion = $dbdata->direccion;
          $ret[$contador]->logo = $dbdata->logo;
          $ret[$contador]->idTipoInstitucion = $dbdata->idTipoInstitucion;
          $ret[$contador]->tipoInstitucion = $dbdata->tipoInstitucion;
          $contador++;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'app':

        $dbdata = DB_DataObject::Factory('Institutions');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idInstitucion,activo,institucion,correo,direccion,logo,idTipoInstitucion,tipoInstitucion,telefono,celular");
        $dbdata->whereAdd("idInstitucion=".$data['idInstitucion']);
        $dbdata->find();
        if( $dbdata->fetch() ){
          $ret['idInstitucion'] = $dbdata->idInstitucion;
          $ret['activo'] = $dbdata->activo;
          $ret['institucion'] = $dbdata->institucion;
          $ret['correo'] = $dbdata->correo;
          $ret['direccion'] = $dbdata->direccion;
          $ret['telefono'] = $dbdata->telefono;
          $ret['celular'] = $dbdata->celular;
          $ret['logo'] = RUTADATA.$dbdata->logo;
          $ret['idTipoInstitucion'] = $dbdata->idTipoInstitucion;
          $ret['tipoInstitucion'] = $dbdata->tipoInstitucion;
        }

        $dbdata->free();
        return $ret;

      break;

      case 'one':

        $dbdata = DB_DataObject::Factory('Institutions');
        $dbdata->selectAdd();
        $dbdata->selectAdd("idInstitucion,activo,institucion,correo,direccion,logo,telefono,celular,idTipoInstitucion,tipoInstitucion");
        $dbdata->whereAdd("idInstitucion=".$data['idInstitucion']);
        $dbdata->find();
        while( $dbdata->fetch() ){
          $ret['idInstitucion'] = $dbdata->idInstitucion;
          $ret['activo'] = $dbdata->activo;
          $ret['institucion'] = $dbdata->institucion;
          $ret['correo'] = $dbdata->correo;
          $ret['direccion'] = $dbdata->direccion;
          $ret['telefono'] = $dbdata->telefono;
          $ret['celular'] = $dbdata->celular;
          $ret['logo'] = $dbdata->logo;
          $ret['idTipoInstitucion'] = $dbdata->idTipoInstitucion;
          $ret['tipoInstitucion'] = $dbdata->tipoInstitucion;
        }

        $dbdata->free();
        return $ret;

      break;

    }


  }

}

?>
