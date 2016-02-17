<?php
/**
 * Table Definition for honors
 */

class DataObject_Honors extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'honors';                          // table name
    public $idReconocimiento;                // int(11)  not_null unsigned
    public $idTipoReconocimiento;            // int(11)  
    public $idInstitucion;                   // int(11)  
    public $reconocimiento;                  // string(200)  
    public $descripcion;                     // blob(65535)  blob
    public $tipoReconocimiento;              // string(150)  
    public $logo;                            // string(255)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Honors',$k,$v); }

    function table()
    {
         return array(
             'idReconocimiento' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idTipoReconocimiento' =>  DB_DATAOBJECT_INT,
             'idInstitucion' =>  DB_DATAOBJECT_INT,
             'reconocimiento' =>  DB_DATAOBJECT_STR,
             'descripcion' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'tipoReconocimiento' =>  DB_DATAOBJECT_STR,
             'logo' =>  DB_DATAOBJECT_STR,
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
             'idReconocimiento' => 0,
             'reconocimiento' => '',
             'descripcion' => '',
             'tipoReconocimiento' => '',
             'logo' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
