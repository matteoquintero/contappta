<?php
/**
 * Table Definition for rol_x_usuario
 */

class DataObject_RolXUsuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'rol_x_usuario';                   // table name
    public $idRol;                           // int(11)  not_null primary_key multiple_key
    public $idUsuario;                       // int(11)  not_null primary_key multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_RolXUsuario',$k,$v); }

    function table()
    {
         return array(
             'idRol' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idUsuario' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
         );
    }

    function keys()
    {
         return array('idRol', 'idUsuario');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
