<?php
/**
 * Table Definition for messages
 */

class DataObject_Messages extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'messages';                        // table name
    public $idMensaje;                       // int(11)  not_null unsigned
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $fechaRegistro;                   // timestamp(19)  unsigned binary
    public $media;                           // string(250)  
    public $idEmisor;                        // int(11)  not_null
    public $usuario;                         // string(100)  not_null
    public $nombre;                          // string(100)  
    public $apellido;                        // string(100)  
    public $foto;                            // string(150)  
    public $idInstitucion;                   // int(11)  not_null
    public $institucion;                     // string(100)  
    public $logo;                            // string(200)  
    public $idRol;                           // int(11)  not_null
    public $rol;                             // string(100)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Messages',$k,$v); }

    function table()
    {
         return array(
             'idMensaje' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
             'media' =>  DB_DATAOBJECT_STR,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'institucion' =>  DB_DATAOBJECT_STR,
             'logo' =>  DB_DATAOBJECT_STR,
             'idRol' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'rol' =>  DB_DATAOBJECT_STR,
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
             'idMensaje' => 0,
             'asunto' => '',
             'descripcion' => '',
             'media' => '',
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
             'foto' => '',
             'institucion' => '',
             'logo' => '',
             'rol' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
