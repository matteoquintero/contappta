<?php
/**
 * Table Definition for fullevents
 */

class DataObject_Fullevents extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'fullevents';                      // table name
    public $fechaRegistro;                   // timestamp(19)  unsigned binary
    public $fechaPublicacion;                // datetime(19)  binary
    public $fechaFin;                        // datetime(19)  binary
    public $fechaInicio;                     // datetime(19)  binary
    public $aprobado;                        // string(2)  enum
    public $visto;                           // string(2)  enum
    public $descripcion;                     // blob(65535)  blob
    public $asunto;                          // string(100)  
    public $usuario;                         // string(100)  not_null
    public $nombre;                          // string(100)  
    public $contrasena;                      // string(250)  
    public $apellido;                        // string(100)  
    public $idInstitucion;                   // int(11)  not_null
    public $idEmisor;                        // int(11)  not_null
    public $idReceptor;                      // int(11)  not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Fullevents',$k,$v); }

    function table()
    {
         return array(
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
             'fechaPublicacion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'fechaFin' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'fechaInicio' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'aprobado' =>  DB_DATAOBJECT_STR,
             'visto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'asunto' =>  DB_DATAOBJECT_STR,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'contrasena' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idReceptor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
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
             'aprobado' => '',
             'visto' => '',
             'descripcion' => '',
             'asunto' => '',
             'usuario' => '',
             'nombre' => '',
             'contrasena' => '',
             'apellido' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
