<?php
/**
 * Table Definition for reconocimiento_x_usuario
 */

class DataObject_ReconocimientoXUsuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'reconocimiento_x_usuario';        // table name
    public $idReconocimiento;                // int(11)  
    public $idUsuario;                       // int(11)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_ReconocimientoXUsuario',$k,$v); }

    function table()
    {
         return array(
             'idReconocimiento' =>  DB_DATAOBJECT_INT,
             'idUsuario' =>  DB_DATAOBJECT_INT,
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
