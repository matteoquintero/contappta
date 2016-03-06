<?php
/**
 * Table Definition for events
 */

class DataObject_Events extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'events';                          // table name
    public $idEvento;                        // int(11)  not_null unsigned
    public $idNotificacion;                  // int(11)  
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $aprobado;                        // string(2)  enum
    public $eliminado;                       // string(2)  enum
    public $publicado;                       // string(2)  enum
    public $fechaInicio;                     // date(10)  binary
    public $fechaFin;                        // date(10)  binary
    public $fechaPublicacion;                // date(10)  binary
    public $fechaRegistro;                   // timestamp(19)  unsigned binary
    public $idEmisor;                        // int(11)  not_null
    public $usuario;                         // string(100)  not_null
    public $apellido;                        // string(100)  
    public $foto;                            // string(150)  
    public $idRol;                           // int(11)  not_null
    public $rol;                             // string(100)  
    public $idInstitucion;                   // int(11)  not_null
    public $institucion;                     // string(100)  
    public $logo;                            // string(200)  
    public $nombre;                          // string(100)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Events',$k,$v); }

    function table()
    {
         return array(
             'idEvento' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idNotificacion' =>  DB_DATAOBJECT_INT,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'aprobado' =>  DB_DATAOBJECT_STR,
             'eliminado' =>  DB_DATAOBJECT_STR,
             'publicado' =>  DB_DATAOBJECT_STR,
             'fechaInicio' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE,
             'fechaFin' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE,
             'fechaPublicacion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'apellido' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
             'idRol' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'rol' =>  DB_DATAOBJECT_STR,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'institucion' =>  DB_DATAOBJECT_STR,
             'logo' =>  DB_DATAOBJECT_STR,
             'nombre' =>  DB_DATAOBJECT_STR,
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
             'idEvento' => 0,
             'asunto' => '',
             'descripcion' => '',
             'aprobado' => '',
             'eliminado' => 'No',
             'publicado' => 'No',
             'usuario' => '',
             'apellido' => '',
             'foto' => '',
             'rol' => '',
             'institucion' => '',
             'logo' => '',
             'nombre' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
