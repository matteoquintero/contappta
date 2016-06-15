<?php
/**
 * Table Definition for reconocimiento_x_usuario
 */

class DataObject_ReconocimientoXUsuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'reconocimiento_x_usuario';        // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idReconocimiento;                // int(11)  
    public $idUsuario;                       // int(11)  
    public $clear;                           // string(2)  enum
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_ReconocimientoXUsuario',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idReconocimiento' =>  DB_DATAOBJECT_INT,
             'idUsuario' =>  DB_DATAOBJECT_INT,
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
             'clear' => 'No',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
