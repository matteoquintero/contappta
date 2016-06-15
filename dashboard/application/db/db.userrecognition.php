<?php
/**
 * Table Definition for userrecognition
 */

class DataObject_Userrecognition extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'userrecognition';                 // table name
    public $idReconocimientoUsuario;         // int(11)  not_null unsigned
    public $idUsuario;                       // int(11)  
    public $idReconocimiento;                // int(11)  
    public $reconocimiento;                  // string(200)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Userrecognition',$k,$v); }

    function table()
    {
         return array(
             'idReconocimientoUsuario' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idUsuario' =>  DB_DATAOBJECT_INT,
             'idReconocimiento' =>  DB_DATAOBJECT_INT,
             'reconocimiento' =>  DB_DATAOBJECT_STR,
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
             'idReconocimientoUsuario' => 0,
             'reconocimiento' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
