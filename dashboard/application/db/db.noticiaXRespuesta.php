<?php
/**
 * Table Definition for noticia_x_respuesta
 */

class DataObject_NoticiaXRespuesta extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'noticia_x_respuesta';             // table name
    public $idNoticia;                       // int(11)  
    public $idRespuesta;                     // int(11)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_NoticiaXRespuesta',$k,$v); }

    function table()
    {
         return array(
             'idNoticia' =>  DB_DATAOBJECT_INT,
             'idRespuesta' =>  DB_DATAOBJECT_INT,
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
