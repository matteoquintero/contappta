<?php
/**
 * Table Definition for revista
 */

class DataObject_Revista extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'revista';                         // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $numeroPaginas;                   // int(11)  
    public $identificador;                   // string(400)  
    public $idInstitucion;                   // int(11)  
    public $revista;                         // string(150)  
    public $descripcion;                     // blob(65535)  blob
    public $consecutivo;                     // int(11)  
    public $clear;                           // string(2)  enum
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Revista',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'numeroPaginas' =>  DB_DATAOBJECT_INT,
             'identificador' =>  DB_DATAOBJECT_STR,
             'idInstitucion' =>  DB_DATAOBJECT_INT,
             'revista' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'consecutivo' =>  DB_DATAOBJECT_INT,
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
             'identificador' => '',
             'revista' => '',
             'descripcion' => '',
             'clear' => 'No',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
