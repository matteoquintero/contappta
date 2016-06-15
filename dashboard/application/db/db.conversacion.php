<?php
/**
 * Table Definition for conversacion
 */

class DataObject_Conversacion extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'conversacion';                    // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $idUsuarioUno;                    // int(11)  
    public $idUsuarioDos;                    // int(11)  
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Conversacion',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idUsuarioUno' =>  DB_DATAOBJECT_INT,
             'idUsuarioDos' =>  DB_DATAOBJECT_INT,
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

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
