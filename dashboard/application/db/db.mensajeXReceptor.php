<?php
/**
 * Table Definition for mensaje_x_receptor
 */

class DataObject_MensajeXReceptor extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'mensaje_x_receptor';              // table name
    public $idMensaje;                       // int(11)  
    public $idReceptor;                      // int(11)  
    public $vista;                           // string(2)  enum

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_MensajeXReceptor',$k,$v); }

    function table()
    {
         return array(
             'idMensaje' =>  DB_DATAOBJECT_INT,
             'idReceptor' =>  DB_DATAOBJECT_INT,
             'vista' =>  DB_DATAOBJECT_STR,
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
             'vista' => 'No',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
