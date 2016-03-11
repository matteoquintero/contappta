<?php
/**
 * Table Definition for usuario
 */

class DataObject_Usuario extends DB_DataObject
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'usuario';                         // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idRol;                           // int(11)  not_null
    public $idInstitucion;                   // int(11)  not_null
    public $idGrupo;                         // int(11)  not_null
    public $deviceToken;                     // blob(65535)  blob
    public $usuario;                         // string(100)  not_null
    public $nombre;                          // string(100)
    public $apellido;                        // string(100)
    public $documento;                       // string(150)
    public $celular;                         // string(150)
    public $correo;                          // string(250)
    public $foto;                            // string(150)
    public $contrasena;                      // string(250)
    public $permiso;                         // string(11)  enum
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Usuario',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idRol' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idGrupo' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'deviceToken' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'documento' =>  DB_DATAOBJECT_STR,
             'celular' =>  DB_DATAOBJECT_STR,
             'correo' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
             'contrasena' =>  DB_DATAOBJECT_STR,
             'permiso' =>  DB_DATAOBJECT_STR,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
         );
    }

    function keys()
    {
         return array('id');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values
    {
         return array(
             'deviceToken' => '',
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
             'documento' => '',
             'celular' => '',
             'correo' => '',
             'foto' => '_data/profilepictures/profile-default.png',
             'contrasena' => '',
             'permiso' => 'user',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
