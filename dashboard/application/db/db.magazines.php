<?php
/**
 * Table Definition for magazines
 */

class DataObject_Magazines extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'magazines';                       // table name
    public $idInstitucion;                   // int(11)  
    public $idRevista;                       // int(11)  not_null unsigned
    public $portada;                         // string(255)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Magazines',$k,$v); }

    function table()
    {
         return array(
             'idInstitucion' =>  DB_DATAOBJECT_INT,
             'idRevista' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'portada' =>  DB_DATAOBJECT_STR,
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
             'idRevista' => 0,
             'portada' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
