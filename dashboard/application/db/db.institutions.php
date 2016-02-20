<?php
/**
 * Table Definition for institutions
 */

class DataObject_Institutions extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'institutions';                    // table name
    public $idInstitucion;                   // int(11)  not_null unsigned
    public $idTipoInstitucion;               // int(11)  
    public $activo;                          // string(2)  enum
    public $institucion;                     // string(100)  
    public $correo;                          // string(45)  
    public $direccion;                       // string(100)  
    public $telefono;                        // string(150)  
    public $celular;                         // string(200)  
    public $logo;                            // string(200)  
    public $tipoInstitucion;                 // string(150)  
    public $descripcion;                     // string(255)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Institutions',$k,$v); }

    function table()
    {
         return array(
             'idInstitucion' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idTipoInstitucion' =>  DB_DATAOBJECT_INT,
             'activo' =>  DB_DATAOBJECT_STR,
             'institucion' =>  DB_DATAOBJECT_STR,
             'correo' =>  DB_DATAOBJECT_STR,
             'direccion' =>  DB_DATAOBJECT_STR,
             'telefono' =>  DB_DATAOBJECT_STR,
             'celular' =>  DB_DATAOBJECT_STR,
             'logo' =>  DB_DATAOBJECT_STR,
             'tipoInstitucion' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR,
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
             'idInstitucion' => 0,
             'activo' => 'No',
             'institucion' => '',
             'correo' => '',
             'direccion' => '',
             'telefono' => '',
             'celular' => '',
             'logo' => '',
             'tipoInstitucion' => '',
             'descripcion' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
