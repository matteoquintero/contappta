<?php
/**
 * Table Definition for messages
 */

class DataObject_Messages extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'messages';                        // table name
    public $idMensaje;                       // int(11)  not_null unsigned
    public $idNotificacion;                  // int(11)  
    public $idInstitucion;                   // int(11)  not_null
    public $idConversacion;                  // int(11)  
    public $mensaje;                         // blob(65535)  blob
    public $visto;                           // string(2)  enum
    public $media;                           // string(250)  
    public $idReceptor;                      // int(11)  
    public $nombreReceptor;                  // string(201)  
    public $usuarioReceptor;                 // string(100)  
    public $rolReceptor;                     // string(100)  
    public $fotoReceptor;                    // string(150)  
    public $idEmisor;                        // int(11)  not_null
    public $nombreEmisor;                    // string(201)  
    public $usuarioEmisor;                   // string(100)  
    public $rolEmisor;                       // string(100)  
    public $fotoEmisor;                      // string(150)  
    public $fechaRegistro;                   // timestamp(19)  unsigned binary

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Messages',$k,$v); }

    function table()
    {
         return array(
             'idMensaje' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idNotificacion' =>  DB_DATAOBJECT_INT,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idConversacion' =>  DB_DATAOBJECT_INT,
             'mensaje' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'visto' =>  DB_DATAOBJECT_STR,
             'media' =>  DB_DATAOBJECT_STR,
             'idReceptor' =>  DB_DATAOBJECT_INT,
             'nombreReceptor' =>  DB_DATAOBJECT_STR,
             'usuarioReceptor' =>  DB_DATAOBJECT_STR,
             'rolReceptor' =>  DB_DATAOBJECT_STR,
             'fotoReceptor' =>  DB_DATAOBJECT_STR,
             'idEmisor' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'nombreEmisor' =>  DB_DATAOBJECT_STR,
             'usuarioEmisor' =>  DB_DATAOBJECT_STR,
             'rolEmisor' =>  DB_DATAOBJECT_STR,
             'fotoEmisor' =>  DB_DATAOBJECT_STR,
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
             'idMensaje' => 0,
             'mensaje' => '',
             'visto' => 'No',
             'media' => '',
             'nombreReceptor' => '',
             'usuarioReceptor' => '',
             'rolReceptor' => '',
             'fotoReceptor' => '',
             'nombreEmisor' => '',
             'usuarioEmisor' => '',
             'rolEmisor' => '',
             'fotoEmisor' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
