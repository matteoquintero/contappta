<?php
/**
 * Table Definition for tipoReconocimiento
 */

class DataObject_TipoReconocimiento extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'tipoReconocimiento';              // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $tipoReconocimiento;              // string(150)  
    public $descripcion;                     // string(255)  
    public $logo;                            // string(255)  
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_TipoReconocimiento',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'tipoReconocimiento' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR,
             'logo' =>  DB_DATAOBJECT_STR,
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
             'tipoReconocimiento' => '',
             'descripcion' => '',
             'logo' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
