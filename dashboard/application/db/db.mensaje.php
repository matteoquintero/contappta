<?php
/**
 * Table Definition for mensaje
 */

class DataObject_Mensaje extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'mensaje';                         // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idInstitucion;                   // int(11)  not_null
    public $idConversacion;                  // int(11)  
    public $idReceptor;                      // int(11)  
    public $idEmisor;                        // int(11)  not_null
    public $idNotificacion;                  // int(11)  
    public $mensaje;                         // blob(65535)  blob
    public $media;                           // string(250)  
    public $eliminado;                       // string(2)  enum
    public $visto;                           // string(2)  enum
    public $consecutivo;                     // int(11)  
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Mensaje',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idConversacion' =>  DB_DATAOBJECT_INT,
             'idReceptor' =>  DB_DATAOBJECT_INT,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idNotificacion' =>  DB_DATAOBJECT_INT,
             'mensaje' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'media' =>  DB_DATAOBJECT_STR,
             'eliminado' =>  DB_DATAOBJECT_STR,
             'visto' =>  DB_DATAOBJECT_STR,
             'consecutivo' =>  DB_DATAOBJECT_INT,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
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
             'mensaje' => '',
             'media' => '',
             'eliminado' => 'No',
             'visto' => 'No',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
