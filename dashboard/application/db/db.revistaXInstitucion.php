<?php
/**
 * Table Definition for revista_x_institucion
 */

class DataObject_RevistaXInstitucion extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'revista_x_institucion';           // table name
    public $idRevista;                       // int(11)  not_null primary_key
    public $idInstitucion;                   // int(11)  not_null primary_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_RevistaXInstitucion',$k,$v); }

    function table()
    {
         return array(
             'idRevista' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
         );
    }

    function keys()
    {
         return array('idRevista', 'idInstitucion');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
