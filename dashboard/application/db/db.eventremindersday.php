<?php
/**
 * Table Definition for eventremindersday
 */

class DataObject_Eventremindersday extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'eventremindersday';               // table name
    public $idNotificacion;                  // int(11)  
    public $idEvento;                        // int(11)  not_null unsigned
    public $fechaInicio;                     // datetime(19)  binary

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Eventremindersday',$k,$v); }

    function table()
    {
         return array(
             'idNotificacion' =>  DB_DATAOBJECT_INT,
             'idEvento' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'fechaInicio' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
         );
    }

    function keys()
    {
         return array();
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'idEvento' => 0,
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
