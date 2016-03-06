<?php
/**
 * Table Definition for chats
 */

class DataObject_Chats extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'chats';                           // table name
    public $idConversacion;                  // int(11)  not_null
    public $idMensaje;                       // int(11)  not_null unsigned
    public $mensaje;                         // blob(65535)  blob
    public $visto;                           // string(2)  enum
    public $eliminado;                       // string(2)  enum
    public $media;                           // string(250)  
    public $fechaRegistro;                   // timestamp(19)  unsigned binary
    public $idUsuarioUno;                    // int(11)  
    public $nombreUsuarioUno;                // string(201)  
    public $usuarioUsuarioUno;               // string(100)  
    public $rolUsuarioUno;                   // string(100)  
    public $fotoUsuarioUno;                  // string(150)  
    public $idUsuarioDos;                    // int(11)  
    public $nombreUsuarioDos;                // string(201)  
    public $usuarioUsuarioDos;               // string(100)  
    public $rolUsuarioDos;                   // string(100)  
    public $fotoUsuarioDos;                  // string(150)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Chats',$k,$v); }

    function table()
    {
         return array(
             'idConversacion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idMensaje' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'mensaje' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'visto' =>  DB_DATAOBJECT_STR,
             'eliminado' =>  DB_DATAOBJECT_STR,
             'media' =>  DB_DATAOBJECT_STR,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
             'idUsuarioUno' =>  DB_DATAOBJECT_INT,
             'nombreUsuarioUno' =>  DB_DATAOBJECT_STR,
             'usuarioUsuarioUno' =>  DB_DATAOBJECT_STR,
             'rolUsuarioUno' =>  DB_DATAOBJECT_STR,
             'fotoUsuarioUno' =>  DB_DATAOBJECT_STR,
             'idUsuarioDos' =>  DB_DATAOBJECT_INT,
             'nombreUsuarioDos' =>  DB_DATAOBJECT_STR,
             'usuarioUsuarioDos' =>  DB_DATAOBJECT_STR,
             'rolUsuarioDos' =>  DB_DATAOBJECT_STR,
             'fotoUsuarioDos' =>  DB_DATAOBJECT_STR,
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
             'idConversacion' => 0,
             'idMensaje' => 0,
             'mensaje' => '',
             'visto' => 'No',
             'eliminado' => 'No',
             'media' => '',
             'nombreUsuarioUno' => '',
             'usuarioUsuarioUno' => '',
             'rolUsuarioUno' => '',
             'fotoUsuarioUno' => '',
             'nombreUsuarioDos' => '',
             'usuarioUsuarioDos' => '',
             'rolUsuarioDos' => '',
             'fotoUsuarioDos' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
