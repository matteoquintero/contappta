<?php
/**
 * Table Definition for acudiente
 */

class DataObject_Acudiente extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'acudiente';                       // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idHijo;                          // int(11)  
    public $idAcudiente;                     // int(11)  
    public $fechaRegistreo;                  // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Acudiente',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idHijo' =>  DB_DATAOBJECT_INT,
             'idAcudiente' =>  DB_DATAOBJECT_INT,
             'fechaRegistreo' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
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
