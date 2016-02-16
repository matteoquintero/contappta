<?php
/**
 * Table Definition for sendersnews
 */

class DataObject_Sendersnews extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'sendersnews';                     // table name
    public $idNoticia;                       // int(11)  not_null
    public $vista;                           // string(2)  enum
    public $idReceptor;                      // int(11)  not_null
    public $usuario;                         // string(100)  
    public $nombre;                          // string(100)  
    public $apellido;                        // string(100)  
    public $foto;                            // string(150)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Sendersnews',$k,$v); }

    function table()
    {
         return array(
             'idNoticia' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'vista' =>  DB_DATAOBJECT_STR,
             'idReceptor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'usuario' =>  DB_DATAOBJECT_STR,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
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
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
             'foto' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
