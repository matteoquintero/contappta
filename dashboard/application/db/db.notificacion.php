<?php
/**
 * Table Definition for notificacion
 */

class DataObject_Notificacion extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'notificacion';                    // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idInstitucion;                   // int(11)  
    public $idEmisor;                        // int(11)  
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $publicadaDashboard;              // string(2)  enum
    public $publicadaApp;                    // string(2)  enum
    public $enlaceDashboard;                 // blob(65535)  blob
    public $enlaceApp;                       // blob(65535)  blob
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Notificacion',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT,
             'idEmisor' =>  DB_DATAOBJECT_INT,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'publicadaDashboard' =>  DB_DATAOBJECT_STR,
             'publicadaApp' =>  DB_DATAOBJECT_STR,
             'enlaceDashboard' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'enlaceApp' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'fechaRegistro' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
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
             'publicadaDashboard' => 'No',
             'publicadaApp' => 'No',
             'enlaceDashboard' => '',
             'enlaceApp' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
