<?php
/**
 * Table Definition for mensaje_x_usuario
 */

class DataObject_MensajeXUsuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'mensaje_x_usuario';               // table name
    public $idMensaje;                       // int(11)  
    public $idEmisor;                        // int(11)  
    public $idReceptor;                      // int(11)  
    public $vista;                           // string(2)  enum
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_MensajeXUsuario',$k,$v); }

    function table()
    {
         return array(
             'idMensaje' =>  DB_DATAOBJECT_INT,
             'idEmisor' =>  DB_DATAOBJECT_INT,
             'idReceptor' =>  DB_DATAOBJECT_INT,
             'vista' =>  DB_DATAOBJECT_STR,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
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
