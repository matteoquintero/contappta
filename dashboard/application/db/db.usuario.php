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
    public $idRol;                           // int(11)  not_null
    public $idInstitucion;                   // int(11)
    public $idGrupo;                         // int(11)  not_null multiple_key
    public $usuario;                         // string(100)  not_null unique_key
    public $nombre;                          // string(100)
    public $apellido;                        // string(100)
    public $documento;                       // string(150)
    public $celular;                         // string(150)
    public $correo;                          // string(250)
    public $foto;                            // string(150)
    public $contrasena;                      // string(250)
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Usuario',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idRol' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idGrupo' =>  DB_DATAOBJECT_INT,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'documento' =>  DB_DATAOBJECT_STR,
             'celular' =>  DB_DATAOBJECT_STR,
             'correo' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
             'contrasena' =>  DB_DATAOBJECT_STR,
             'fechaRegistro' =>  DB_DATAOBJECT_MYSQLTIMESTAMP,
         );
    }

    function keys()
    {
         return array('id');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', false, false);
    }

    function defaults() // column default values
    {
         return array(
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
             'documento' => '',
             'celular' => '',
             'correo' => '',
             'foto' => '',
             'contrasena' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    function links()
    {
        $links = array();
        $links["idInstitucion"] = "institucion:id";
        $links["idGrupo"] = "grupo:id";
        $links["idRol"] = "rol:id";
        return $links;
    }

}
