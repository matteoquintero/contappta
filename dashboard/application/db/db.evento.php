<?php
/**
 * Table Definition for evento
 */

class DataObject_Evento extends DB_DataObject
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'evento';                          // table name
    public $idEvento;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idInstitucion;                   // int(11)  not_null
    public $idEmisor;                        // int(11)  not_null
    public $asunto;                          // string(100)
    public $descripcion;                     // blob(65535)  blob
    public $aprobado;                        // string(2)  enum
    public $fechaInicio;                     // datetime(19)  binary
    public $fechaFin;                        // datetime(19)  binary
    public $fechaPublicacion;                // datetime(19)  binary
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Evento',$k,$v); }

    function table()
    {
         return array(
             'idEvento' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'aprobado' =>  DB_DATAOBJECT_STR,
             'fechaInicio' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'fechaFin' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'fechaPublicacion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
         );
    }

    function keys()
    {
         return array('idEvento');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('idEvento', true, false);
    }

    function defaults() // column default values
    {
         return array(
             'asunto' => '',
             'descripcion' => '',
             'aprobado' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
