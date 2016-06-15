<?php
/**
 * Table Definition for notificacion_x_receptor
 */

class DataObject_NotificacionXReceptor extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'notificacion_x_receptor';         // table name
    public $idNotificacion;                  // int(11)  not_null
    public $idReceptor;                      // int(11)  not_null
    public $idTipo;                          // int(11)  
    public $idConversacion;                  // int(11)  
    public $tipo;                            // string(11)  enum
    public $vista;                           // string(2)  enum
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_NotificacionXReceptor',$k,$v); }

    function table()
    {
         return array(
             'idNotificacion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idReceptor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idTipo' =>  DB_DATAOBJECT_INT,
             'idConversacion' =>  DB_DATAOBJECT_INT,
             'tipo' =>  DB_DATAOBJECT_STR,
             'vista' =>  DB_DATAOBJECT_STR,
             'fechaRegistro' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
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
             'tipo' => '',
             'vista' => 'No',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
