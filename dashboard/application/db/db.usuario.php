<?php
/**
 * Table Definition for usuario
 */

class DataObject_Usuario extends DB_DataObject
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'usuario';                         // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $idPadre;                         // int(11)
    public $idInstitucion;                   // int(11)  not_null multiple_key
    public $idGrado;                         // int(11)  not_null multiple_key
    public $usuario;                         // string(100)  not_null unique_key
    public $nombre;                          // string(100)
    public $correo;                          // string(200)
    public $apellido;                        // string(100)
    public $contrasena;                      // string(250)
    public $foto;                            // string(150)
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Usuario',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idPadre' =>  DB_DATAOBJECT_INT,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idGrado' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'correo' =>  DB_DATAOBJECT_STR,
             'contrasena' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
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
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
             'contrasena' => '',
             'foto' => '',
             'correo' => ''
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
