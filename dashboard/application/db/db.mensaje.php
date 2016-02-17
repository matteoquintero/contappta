<?php
/**
 * Table Definition for mensaje
 */

class DataObject_Mensaje extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'mensaje';                         // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idInstitucion;                   // int(11)  not_null
    public $idEmisor;                        // int(11)  not_null
    public $mensaje;                         // blob(65535)  blob
    public $media;                           // string(250)  
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Mensaje',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'mensaje' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'media' =>  DB_DATAOBJECT_STR,
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
             'mensaje' => '',
             'media' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
