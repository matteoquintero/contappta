<?php
/**
 * Table Definition for institucion
 */

class DataObject_Institucion extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'institucion';                     // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idTipoInstitucion;               // int(11)  
    public $activo;                          // string(2)  enum
    public $institucion;                     // string(100)  
    public $correo;                          // string(45)  
    public $direccion;                       // string(100)  
    public $logo;                            // string(200)  
    public $telefono;                        // string(150)  
    public $celular;                         // string(200)  
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp
    public $clear;                           // string(2)  enum

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Institucion',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idTipoInstitucion' =>  DB_DATAOBJECT_INT,
             'activo' =>  DB_DATAOBJECT_STR,
             'institucion' =>  DB_DATAOBJECT_STR,
             'correo' =>  DB_DATAOBJECT_STR,
             'direccion' =>  DB_DATAOBJECT_STR,
             'logo' =>  DB_DATAOBJECT_STR,
             'telefono' =>  DB_DATAOBJECT_STR,
             'celular' =>  DB_DATAOBJECT_STR,
             'fechaRegistro' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
             'clear' =>  DB_DATAOBJECT_STR,
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
             'institucion' => '',
             'correo' => '',
             'direccion' => '',
             'logo' => '',
             'telefono' => '',
             'celular' => '',
             'clear' => 'No',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
