<?php
/**
 * Table Definition for reciversnotifications
 */

class DataObject_Reciversnotifications extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'reciversnotifications';           // table name
    public $idNotificacion;                  // int(11)  not_null
    public $vista;                           // string(6)  enum
    public $idReceptor;                      // int(11)  not_null
    public $deviceToken;                     // blob(65535)  blob
    public $usuario;                         // string(100)  not_null
    public $nombre;                          // string(100)  
    public $apellido;                        // string(100)  
    public $foto;                            // string(150)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Reciversnotifications',$k,$v); }

    function table()
    {
         return array(
             'idNotificacion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'vista' =>  DB_DATAOBJECT_STR,
             'idReceptor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'deviceToken' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
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
             'deviceToken' => '',
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
             'foto' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
