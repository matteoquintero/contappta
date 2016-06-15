<?php
/**
 * Table Definition for pagina
 */

class DataObject_Pagina extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'pagina';                          // table name
    public $id;                              // int(11)  not_null primary_key unsigned auto_increment
    public $idRevista;                       // int(11)  
    public $numeroPagina;                    // int(11)  
    public $pagina;                          // string(255)  
    public $media;                           // string(255)  
    public $fechaRegistro;                   // timestamp(19)  unsigned binary timestamp

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_Pagina',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idRevista' =>  DB_DATAOBJECT_INT,
             'numeroPagina' =>  DB_DATAOBJECT_INT,
             'pagina' =>  DB_DATAOBJECT_STR,
             'media' =>  DB_DATAOBJECT_STR,
             'fechaRegistro' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
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
             'pagina' => '',
             'media' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
