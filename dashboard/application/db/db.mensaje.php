<?php
/**
 * Table Definition for mensaje
 */

class DataObject_Mensaje extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'mensaje';                         // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $idInstitucion;                   // int(11)  not_null multiple_key
    public $idEmisor;                        // int(11)  not_null
    public $idReceptor;                      // int(11)  not_null
    public $idTipoReceptor;                  // int(11)  not_null multiple_key
    public $asunto;                          // string(100)  
    public $descripcion;                     // blob(65535)  blob
    public $media;                           // string(250)  
    public $visto;                           // string(2)  enum
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Mensaje',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idReceptor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idTipoReceptor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'asunto' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'media' =>  DB_DATAOBJECT_STR,
             'visto' =>  DB_DATAOBJECT_STR,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
         );
    }

    function keys()
    {
         return array('id');
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
             'visto' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
