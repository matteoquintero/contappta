<?php
/**
 * Table Definition for events
 */

class DataObject_Events extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'events';                          // table name
    public $id;                              // int(11)  not_null unsigned
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $aprobado;                        // string(2)  enum
    public $fechaInicio;                     // datetime(19)  binary
    public $fechaFin;                        // datetime(19)  binary
    public $fechaPublicacion;                // datetime(19)  binary
    public $fechaRegistro;                   // timestamp(19)  unsigned binary
    public $idEmisor;                        // int(11)  not_null
    public $usuario;                         // string(100)  not_null
    public $nombre;                          // string(100)  
    public $apellido;                        // string(100)  
    public $foto;                            // string(150)  
    public $idRol;                           // int(11)  not_null
    public $rol;                             // string(100)  
    public $idInstitucion;                   // int(11)  not_null
    public $institucion;                     // string(100)  
    public $logo;                            // string(200)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Events',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'aprobado' =>  DB_DATAOBJECT_STR,
             'fechaInicio' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'fechaFin' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'fechaPublicacion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
             'idRol' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'rol' =>  DB_DATAOBJECT_STR,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'institucion' =>  DB_DATAOBJECT_STR,
             'logo' =>  DB_DATAOBJECT_STR,
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
             'id' => 0,
             'asunto' => '',
             'descripcion' => '',
             'aprobado' => '',
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
             'foto' => '',
             'rol' => '',
             'institucion' => '',
             'logo' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
