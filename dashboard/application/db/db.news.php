<?php
/**
 * Table Definition for news
 */

class DataObject_News extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'news';                            // table name
    public $idNoticia;                       // int(11)  not_null unsigned
    public $idNotificacion;                  // int(11)  
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $media;                           // string(250)  
    public $publicada;                       // string(2)  enum
    public $respuesta;                       // string(2)  enum
    public $aprobada;                        // string(2)  enum
    public $fechaPublicacion;                // datetime(19)  binary
    public $fechaRegistro;                   // timestamp(19)  unsigned binary
    public $idInstitucion;                   // int(11)  not_null
    public $institucion;                     // string(100)  
    public $logo;                            // string(200)  
    public $idPlantilla;                     // int(11)  not_null
    public $plantilla;                       // string(100)  
    public $imagen;                          // string(200)  
    public $idEmisor;                        // int(11)  not_null
    public $usuario;                         // string(100)  not_null
    public $nombre;                          // string(100)  
    public $apellido;                        // string(100)  
    public $foto;                            // string(150)  
    public $rol;                             // string(100)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_News',$k,$v); }

    function table()
    {
         return array(
             'idNoticia' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idNotificacion' =>  DB_DATAOBJECT_INT,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'media' =>  DB_DATAOBJECT_STR,
             'publicada' =>  DB_DATAOBJECT_STR,
             'respuesta' =>  DB_DATAOBJECT_STR,
             'aprobada' =>  DB_DATAOBJECT_STR,
             'fechaPublicacion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'fechaRegistro' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'institucion' =>  DB_DATAOBJECT_STR,
             'logo' =>  DB_DATAOBJECT_STR,
             'idPlantilla' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'plantilla' =>  DB_DATAOBJECT_STR,
             'imagen' =>  DB_DATAOBJECT_STR,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
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
             'idNoticia' => 0,
             'asunto' => '',
             'descripcion' => '',
             'media' => '',
             'publicada' => 'No',
             'respuesta' => 'No',
             'aprobada' => 'No',
             'institucion' => '',
             'logo' => '',
             'plantilla' => '',
             'imagen' => '',
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
             'foto' => '',
             'rol' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
