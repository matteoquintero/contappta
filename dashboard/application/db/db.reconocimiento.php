<?php
/**
 * Table Definition for reconocimiento
 */

class DataObject_Reconocimiento extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'reconocimiento';                  // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idTipoReconocimiento;            // int(11)  
    public $idInstitucion;                   // int(11)  
    public $reconocimiento;                  // string(200)  
    public $descripcion;                     // blob(65535)  blob
    public $clear;                           // string(2)  enum
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Reconocimiento',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idTipoReconocimiento' =>  DB_DATAOBJECT_INT,
             'idInstitucion' =>  DB_DATAOBJECT_INT,
             'reconocimiento' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
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
             'reconocimiento' => '',
             'descripcion' => '',
             'clear' => 'No',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
