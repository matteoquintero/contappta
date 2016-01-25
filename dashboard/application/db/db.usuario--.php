<?php
/**
 * Table Definition for usuario
 */

class DataObject_Usuario extends DB_DataObject
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'usuario';                         // table name
    public $id;                              // int(10)  not_null primary_key unsigned auto_increment
    public $idRol;                           // int(10)  not_null multiple_key unsigned
    public $idPadre;                         // int(10)  unsigned
    public $idParentesco;                    // int(10)
    public $idPerfilProfesional;             // int(10)
    public $idCiudad;                        // int(10)
    public $usuario;                         // string(150)  multiple_key
    public $nombre;                          // string(100)
    public $apellido;                        // string(100)
    public $documento;                       // string(150)
    public $correo;                          // string(200)
    public $telefono;                        // string(100)
    public $celular;                         // string(100)
    public $direccion;                       // string(150)
    public $contrasena;                      // string(150)
    public $foto;                            // string(200)
    public $fechaNacimiento;                 // date(10)  binary
    public $activo;                          // string(2)  enum
    public $legal;                           // string(2)  enum
    public $mayor;                           // string(2)  enum
    public $demo;                            // string(2)  enum
    public $caso;                            // string(2)  enum
    public $fechaIngreso;                    // datetime(19)  binary
    public $fechaRegistro;                   // timestamp(19)  binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Usuario',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idRol' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idPadre' =>  DB_DATAOBJECT_INT,
             'idParentesco' =>  DB_DATAOBJECT_INT,
             'idPerfilProfesional' =>  DB_DATAOBJECT_INT,
             'idCiudad' =>  DB_DATAOBJECT_INT,
             'usuario' =>  DB_DATAOBJECT_STR,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'documento' =>  DB_DATAOBJECT_STR,
             'correo' =>  DB_DATAOBJECT_STR,
             'telefono' =>  DB_DATAOBJECT_STR,
             'celular' =>  DB_DATAOBJECT_STR,
             'direccion' =>  DB_DATAOBJECT_STR,
             'contrasena' =>  DB_DATAOBJECT_STR,
             'foto' =>  DB_DATAOBJECT_STR,
             'fechaNacimiento' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE,
             'activo' =>  DB_DATAOBJECT_STR,
             'legal' =>  DB_DATAOBJECT_STR,
             'mayor' =>  DB_DATAOBJECT_STR,
             'demo' =>  DB_DATAOBJECT_STR,
             'caso' =>  DB_DATAOBJECT_STR,
             'fechaIngreso' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
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
             'idPadre' => 0,
             'usuario' => '',
             'nombre' => '',
             'apellido' => '',
             'documento' => '',
             'correo' => '',
             'telefono' => '',
             'celular' => '',
             'direccion' => '',
             'contrasena' => '',
             'foto' => '',
             'activo' => 'No',
             'legal' => 'No',
             'mayor' => 'No',
             'demo' => 'No',
             'caso' => 'No',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    function links()
    {
        $links = array();
        $links["idRol"] = "rol:id";
        $links["idParentesco"] = "parentesco:id";
        $links["idCiudad"] = "ciudad:id";
        $links["idPerfilProfesional"] = "perfil_profesional:id";
        return $links;
    }
}
