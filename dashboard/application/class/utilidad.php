<?php

class Utilidad
{

	function __construct()
	{

	}

    public function GenerarArchivo($Ruta, $Nombre, $NombreFile) {

        $ArrayRuta = explode("/", $Ruta);
        $Path="";
        for ($index = 0; $index < count($ArrayRuta); $index++) {
            if ($ArrayRuta[$index] != ''){ $Path.=$ArrayRuta[$index] . '/'; }

            if (!is_dir($Path)){ @mkdir($Path, 0777, true); chmod($Path, 0777,true); }
            else{ $Path = $Path; }
        }
        $ArrayRespuesta = $this->CopiarArchivo($Path, $Nombre, $NombreFile);
        return $ArrayRespuesta;
    }

    private function CopiarArchivo($Path, $Nombre, $NombreFile) {

        $filename = $_FILES["$NombreFile"]['name'];
        $partesNombre = explode(".", $filename);
        $tamano=count($partesNombre)-1;
        $tipo=$partesNombre[$tamano];

        $permit=array("xlsx","jpg",'jpeg','png','gif','xls');

        if ( !in_array($tipo, $permit) ) {

          switch ($_FILES["$NombreFile"]['type']) {

            case 'image/jpeg':
              $tipo="jpg";
            break;
            case 'image/png':
              $tipo="png";
            break;
            case 'image/gif':
              $tipo="gif";
            break;

          }

        }

        $NombreArchivo =  $Nombre.".".$tipo;
        $Ruta = $Path . $NombreArchivo;
        if (copy($_FILES["$NombreFile"]['tmp_name'], $Ruta)) {
            $ArrayRespuesta[0] = true;
            $ArrayRuta = explode("_data", $Ruta);
            $ArrayRespuesta[1] = "_data".$ArrayRuta[1];
            $ArrayRespuesta[2] = $filename;
            $ArrayRespuesta[3] = $tipo;

        } else {
            $ArrayRespuesta[0] = false;
        }

        return $ArrayRespuesta;

    }

    function datasection($section) {

        $datasection=array();

        switch ($section) {

            default:
                $datasection["goldenkeyword"]="";
                $datasection["title"]="Contappta";
                $datasection["metadescription"]="";
                $datasection["ogtitle"]="";
                $datasection["ogdescription"]="";
                $datasection["ogurl"]="";
                $datasection["h1"]="";
                $datasection["name"]="";
            break;

            case 'instituciones':
                $datasection["goldenkeyword"]="";
                $datasection["title"]="Instituciones";
                $datasection["metadescription"]="";
                $datasection["ogtitle"]="";
                $datasection["ogdescription"]="";
                $datasection["ogurl"]="";
                $datasection["h1"]="";
        				$datasection["name"]="";
            break;

            case 'soluciones':
                $datasection["goldenkeyword"]="Abogados en linea Abogados Conciliacion";
                $datasection["title"]="Descubra qué es Casos 24-7";
                $datasection["metadescription"]="Casos 24-7 con sus abogados en línea le da asesorías legales para que usted siempre tenga un soporte legal y sepa cómo actuar.";
                $datasection["ogtitle"]="Descubra qué es Casos 24-7";
                $datasection["ogdescription"]="Casos 24-7 con sus abogados en línea le da asesorías legales para que usted siempre tenga un soporte legal y sepa cómo actuar.";
                $datasection["ogurl"]="//www.casos24-7.co/que-es";
                $datasection["h1"]="Conozca qué es y cómo funciona casos 24-7";
        				$datasection["name"]="solutions";
            break;

        }
        return $datasection;
    }

    function operationdate($mode,$startdate,$enddate,$data) {

        $dateresult=false;
        if ($startdate==="") { $startdate=date('Y-m-d H:i:s'); }
        if ($enddate==="") { $enddate=date('Y-m-d H:i:s'); }

        switch ($mode) {

            case "add-month":
                $dateopration = strtotime('+' . $data . ' month', strtotime($startdate));
                $dateresult = date('Y-m-d H:i', $dateopration);
            break;

            case "add-day":
                $dateopration = strtotime('+' . $data . ' day', strtotime($startdate));
                $dateresult = date('Y-m-d H:i', $dateopration);
            break;

            case "add-day-pse":
                $dateopration = strtotime('+' . $data . ' day', strtotime($startdate));
                $dateresult = date('Y-m-d', $dateopration)."T".date('H:i:s', $dateopration);;
            break;

            case "deduct-month":
                $dateopration = strtotime('-' . $data . ' month', strtotime($startdate));
                $dateresult = date('Y-m-d H:i', $dateopration);
            break;

            case "greater":
                if ( strtotime($startdate) > strtotime($enddate) ){ $dateresult=true; }
            break;

            case "equal":
                if ( strtotime($startdate) === strtotime($enddate) ) { $dateresult=true; }
            break;

            case "less":
                if ( strtotime($startdate) < strtotime($enddate) ){ $dateresult=true; }
            break;
        }

       return $dateresult;

    }

}
?>
