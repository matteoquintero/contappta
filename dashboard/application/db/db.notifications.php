<?php
/**
 * Table Definition for notifications
 */

class DataObject_Notifications extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'notifications';                   // table name
    public $idInstitucion;                   // int(11)  
    public $idNotificacion;                  // int(11)  not_null
    public $idReceptor;                      // int(11)  not_null
    public $vista;                           // string(2)  enum
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $enlaceApp;                       // blob(65535)  blob
    public $enlaceDashboard;                 // blob(65535)  blob
    public $nombre;                          // string(100)  
    public $apellido;                        // string(100)  
    public $usuario;                         // string(100)  not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Notifications',$k,$v); }

    function table()
    {
         return array(
             'idInstitucion' =>  DB_DATAOBJECT_INT,
             'idNotificacion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idReceptor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'vista' =>  DB_DATAOBJECT_STR,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'enlaceApp' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'enlaceDashboard' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
         );
    }

    function keys()
    {
         return array();
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'vista' => 'No',
             'asunto' => '',
             'descripcion' => '',
             'enlaceApp' => '',
             'enlaceDashboard' => '',
             'nombre' => '',
             'apellido' => '',
             'usuario' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
