<?php
/**
 * Table Definition for answersnews
 */

class DataObject_Answersnews extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'answersnews';                     // table name
    public $idNoticia;                       // int(11)  
    public $idRespuesta;                     // int(11)  not_null unsigned
    public $respuesta;                       // blob(65535)  blob
    public $idUsuario;                       // int(11)  
    public $usuario;                         // string(100)  not_null
    public $nombre;                          // string(100)  
    public $apellido;                        // string(100)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Answersnews',$k,$v); }

    function table()
    {
         return array(
             'idNoticia' =>  DB_DATAOBJECT_INT,
             'idRespuesta' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'respuesta' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'idUsuario' =>  DB_DATAOBJECT_INT,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
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
             'idRespuesta' => 0,
             'respuesta' => '',
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
