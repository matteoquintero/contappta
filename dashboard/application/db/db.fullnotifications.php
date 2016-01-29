<?php
/**
 * Table Definition for fullnotifications
 */

class DataObject_Fullnotifications extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'fullnotifications';               // table name
    public $idUsuario;                       // int(11)  not_null
    public $nombre;                          // string(100)  
    public $apellido;                        // string(100)  
    public $usuario;                         // string(100)  not_null
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $fechaRegistro;                   // timestamp(19)  unsigned binary
    public $idEmisor;                        // int(11)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Fullnotifications',$k,$v); }

    function table()
    {
         return array(
             'idUsuario' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
             'idEmisor' =>  DB_DATAOBJECT_INT,
         );
    }

    function keys()
    {
         return array();
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', false, false);
    }

    function defaults() // column default values 
    {
         return array(
             'idUsuario' => 0,
             'nombre' => '',
             'apellido' => '',
             'usuario' => '',
             'asunto' => '',
             'descripcion' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
