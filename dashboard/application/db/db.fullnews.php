<?php
/**
 * Table Definition for fullnews
 */

class DataObject_Fullnews extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'fullnews';                        // table name
    public $idInstitucion;                   // int(11)  not_null
    public $idEmisor;                        // int(11)  not_null
    public $idReceptor;                      // int(11)  not_null
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $media;                           // string(250)  
    public $vista;                           // string(2)  enum
    public $aprobada;                        // string(2)  enum
    public $fechaPublicacion;                // datetime(19)  binary
    public $fechaRegistro;                   // timestamp(19)  unsigned binary
    public $plantilla;                       // string(100)  
    public $tipoReceptor;                    // string(100)  
    public $usuario;                         // string(100)  not_null
    public $nombre;                          // string(100)  
    public $apellido;                        // string(100)  
    public $foto;                            // string(150)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Fullnews',$k,$v); }

    function table()
    {
         return array(
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idReceptor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'media' =>  DB_DATAOBJECT_STR,
             'vista' =>  DB_DATAOBJECT_STR,
             'aprobada' =>  DB_DATAOBJECT_STR,
             'fechaPublicacion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
             'plantilla' =>  DB_DATAOBJECT_STR,
             'tipoReceptor' =>  DB_DATAOBJECT_STR,
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
         return array('id', false, false);
    }

    function defaults() // column default values 
    {
         return array(
             'asunto' => '',
             'descripcion' => '',
             'media' => '',
             'vista' => '',
             'aprobada' => '',
             'plantilla' => '',
             'tipoReceptor' => '',
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
             'foto' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
