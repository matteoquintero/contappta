<?php
/**
 * Table Definition for grado_x_institucion
 */

class DataObject_GradoXInstitucion extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'grado_x_institucion';             // table name
    public $idGrado;                         // int(11)  not_null primary_key multiple_key
    public $idInstitucion;                   // int(11)  not_null primary_key multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_GradoXInstitucion',$k,$v); }

    function table()
    {
         return array(
             'idGrado' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
         );
    }

    function keys()
    {
         return array('idGrado', 'idInstitucion');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
