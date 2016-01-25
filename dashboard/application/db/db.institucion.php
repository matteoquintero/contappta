<?php
/**
 * Table Definition for institucion
 */

class DataObject_Institucion extends DB_DataObject
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'institucion';                     // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $activo;                          // string(2)  enum
    public $nombre;                          // string(100)
    public $correo;                          // string(45)
    public $direccion;                       // string(100)
    public $logo;                            // string(200)
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Institucion',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'activo' =>  DB_DATAOBJECT_STR,
             'nombre' =>  DB_DATAOBJECT_STR,
             'correo' =>  DB_DATAOBJECT_STR,
             'direccion' =>  DB_DATAOBJECT_STR,
             'logo' =>  DB_DATAOBJECT_STR,
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
             'activo' => 'No',
             'nombre' => '',
             'correo' => '',
             'direccion' => '',
             'logo' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
