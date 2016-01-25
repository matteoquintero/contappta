<?php
/**
 * Table Definition for tipoReceptor
 */

class DataObject_TipoReceptor extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'tipoReceptor';                    // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $tipoReceptor;                    // string(100)  
    public $descripcion;                     // string(150)  
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_TipoReceptor',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'tipoReceptor' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR,
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
             'tipoReceptor' => '',
             'descripcion' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
