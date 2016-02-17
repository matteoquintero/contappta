<?php
/**
 * Table Definition for revista_x_pagina
 */

class DataObject_RevistaXPagina extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'revista_x_pagina';                // table name
    public $idRevista;                       // int(11)  
    public $idPagina;                        // int(11)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_RevistaXPagina',$k,$v); }

    function table()
    {
         return array(
             'idRevista' =>  DB_DATAOBJECT_INT,
             'idPagina' =>  DB_DATAOBJECT_INT,
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

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
