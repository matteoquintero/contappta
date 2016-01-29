<?php
/**
 * Table Definition for fullmessages
 */

class DataObject_Fullmessages extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'fullmessages';                    // table name
    public $visto;                           // string(2)  enum
    public $media;                           // string(250)  
    public $descripcion;                     // blob(65535)  blob
    public $asunto;                          // string(100)  
    public $idEmisor;                        // int(11)  not_null
    public $idReceptor;                      // int(11)  not_null
    public $idInstitucion;                   // int(11)  not_null
    public $usuario;                         // string(100)  not_null
    public $nombre;                          // string(100)  
    public $apellido;                        // string(100)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Fullmessages',$k,$v); }

    function table()
    {
         return array(
             'visto' =>  DB_DATAOBJECT_STR,
             'media' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'asunto' =>  DB_DATAOBJECT_STR,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idReceptor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
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
             'visto' => '',
             'media' => '',
             'descripcion' => '',
             'asunto' => '',
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
