<?php
/**
 * Table Definition for usuario_x_notificacion
 */

class DataObject_UsuarioXNotificacion extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'usuario_x_notificacion';          // table name
    public $idUsuario;                       // int(11)  not_null primary_key multiple_key
    public $idNotificacion;                  // int(11)  not_null primary_key multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_UsuarioXNotificacion',$k,$v); }

    function table()
    {
         return array(
             'idUsuario' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idNotificacion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
         );
    }

    function keys()
    {
         return array('idUsuario', 'idNotificacion');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', false, false);
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
