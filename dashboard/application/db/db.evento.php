<?php
/**
 * Table Definition for evento
 */

class DataObject_Evento extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'evento';                          // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idInstitucion;                   // int(11)  not_null
    public $idNotificacion;                  // int(11)  
    public $idEmisor;                        // int(11)  not_null
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $aprobado;                        // string(2)  enum
    public $publicado;                       // string(2)  enum
    public $eliminado;                       // string(2)  enum
    public $fechaInicio;                     // date(10)  binary
    public $fechaFin;                        // date(10)  binary
    public $fechaPublicacion;                // date(10)  binary
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Evento',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idNotificacion' =>  DB_DATAOBJECT_INT,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'aprobado' =>  DB_DATAOBJECT_STR,
             'publicado' =>  DB_DATAOBJECT_STR,
             'eliminado' =>  DB_DATAOBJECT_STR,
             'fechaInicio' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE,
             'fechaFin' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE,
             'fechaPublicacion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
         );
    }

    function keys()
    {
         return array('id');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'asunto' => '',
             'descripcion' => '',
             'aprobado' => '',
             'publicado' => 'No',
             'eliminado' => 'No',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
