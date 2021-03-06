<?php
/**
 * Table Definition for noticia
 */

class DataObject_Noticia extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'noticia';                         // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idInstitucion;                   // int(11)  not_null
    public $idEmisor;                        // int(11)  not_null
    public $idPlantilla;                     // int(11)  not_null
    public $idNotificacion;                  // int(11)  
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $media;                           // string(250)  
    public $publicada;                       // string(2)  enum
    public $aprobada;                        // string(2)  enum
    public $respuesta;                       // string(2)  enum
    public $consecutivo;                     // int(11)  
    public $fechaPublicacion;                // datetime(19)  binary
    public $clear;                           // string(2)  enum
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Noticia',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idPlantilla' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idNotificacion' =>  DB_DATAOBJECT_INT,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'media' =>  DB_DATAOBJECT_STR,
             'publicada' =>  DB_DATAOBJECT_STR,
             'aprobada' =>  DB_DATAOBJECT_STR,
             'respuesta' =>  DB_DATAOBJECT_STR,
             'consecutivo' =>  DB_DATAOBJECT_INT,
             'fechaPublicacion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'clear' =>  DB_DATAOBJECT_STR,
             'fechaRegistro' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
         );
    }

    function keys()
    {
         return array('id');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'asunto' => '',
             'descripcion' => '',
             'media' => '',
             'publicada' => 'No',
             'aprobada' => 'No',
             'respuesta' => 'No',
             'clear' => 'No',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
