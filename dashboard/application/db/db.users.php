<?php
/**
 * Table Definition for users
 */

class DataObject_Users extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'users';                           // table name
    public $idUsuario;                       // int(11)  not_null unsigned
    public $usuario;                         // string(100)  not_null
    public $apellido;                        // string(100)  
    public $nombre;                          // string(100)  
    public $documento;                       // string(150)  
    public $celular;                         // string(150)  
    public $correo;                          // string(250)  
    public $foto;                            // string(150)  
    public $contrasena;                      // string(250)  
    public $permiso;                         // string(11)  enum
    public $idRol;                           // int(11)  not_null
    public $rol;                             // string(100)  
    public $idInstitucion;                   // int(11)  not_null
    public $institucion;                     // string(100)  
    public $logo;                            // string(200)  
    public $idGrupo;                         // int(11)  not_null
    public $grado;                           // string(45)  
    public $identificador;                   // string(45)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Users',$k,$v); }

    function table()
    {
         return array(
             'idUsuario' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'usuario' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'apellido' =>  DB_DATAOBJECT_STR,
             'nombre' =>  DB_DATAOBJECT_STR,
             'documento' =>  DB_DATAOBJECT_STR,
             'celular' =>  DB_DATAOBJECT_STR,
             'correo' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
             'contrasena' =>  DB_DATAOBJECT_STR,
             'permiso' =>  DB_DATAOBJECT_STR,
             'idRol' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'rol' =>  DB_DATAOBJECT_STR,
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'institucion' =>  DB_DATAOBJECT_STR,
             'logo' =>  DB_DATAOBJECT_STR,
             'idGrupo' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'grado' =>  DB_DATAOBJECT_STR,
             'identificador' =>  DB_DATAOBJECT_STR,
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
             'idUsuario' => 0,
             'usuario' => '',
             'apellido' => '',
             'nombre' => '',
             'documento' => '',
             'celular' => '',
             'correo' => '',
             'foto' => '',
             'contrasena' => '',
             'permiso' => 'any',
             'rol' => '',
             'institucion' => '',
             'logo' => '',
             'grado' => '',
             'identificador' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
