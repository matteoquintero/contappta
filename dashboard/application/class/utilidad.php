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

    function forcedownload($path)
    {

        $path_parts = pathinfo($path);
        $filename=$path_parts["basename"];

        if( $filename == '' || $path == '' )
        {
            return false;
        }

        if( !file_exists( $path ) )
        {
            return false;
        }

        // Try to determine if the filename includes a file extension.
        // We need it in order to set the MIME type
        if( false === strpos( $filename, '.' ) )
        {
            return false;
        }

        // Grab the file extension
        $extension = strtolower( pathinfo( basename( $filename ), PATHINFO_EXTENSION ) );

        // our list of mime types
        $mime_types = array(

            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        // Set a default mime if we can't find it
        if( !isset( $mime_types[$extension] ) )
        {
            $mime = 'application/octet-stream';
        }
        else
        {
            $mime = ( is_array( $mime_types[$extension] ) ) ? $mime_types[$extension][0] : $mime_types[$extension];
        }

        // Generate the server headers
        if( strstr( $_SERVER['HTTP_USER_AGENT'], "MSIE" ) )
        {
            header( 'Content-Type: "'.$mime.'"' );
            header( 'Content-Disposition: attachment; filename="'.$filename.'"' );
            header( 'Expires: 0' );
            header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
            header( "Content-Transfer-Encoding: binary" );
            header( 'Pragma: public' );
            header( "Content-Length: ".filesize( $path ) );
        }
        else
        {
            header( "Pragma: public" );
            header( "Expires: 0" );
            header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
            header( "Cache-Control: private", false );
            header( "Content-Type: ".$mime, true, 200 );
            header( 'Content-Length: '.filesize( $path ) );
            header( 'Content-Disposition: attachment; filename='.$filename);
            header( "Content-Transfer-Encoding: binary" );
        }
        readfile( $path );
        exit;

    }


    public function downloadfile($file) {

        ignore_user_abort(true);
        set_time_limit(0);

        if ($fd = fopen ($file, "r")) {
            $fsize = filesize($file);
            $path_parts = pathinfo($file);
            $ext = strtolower($path_parts["extension"]);
            switch ($ext) {
                case "pdf":
                header("Content-type: application/pdf");
                header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
                break;
                default;
                header("Content-type: application/octet-stream");
                header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
                break;
            }
            header("Content-length: $fsize");
            header("Cache-control: private");
            while(!feof($fd)) {
                $buffer = fread($fd, 2048);
                echo $buffer;
            }
        }
        fclose ($fd);
        exit;

    }

    function Descargar($file,$name) {

        if (is_file($file)) {
            $height = filesize($file);
            header("Content-Disposition: attachment; filename=$name");
            header("Content-Type: application/force-download");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . $height);
            readfile($Path);
        } else {
            exit();
        }
    }

    public function ipinfo($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;

    }

    function getipaddress() {
        $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
        foreach ($ip_keys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if ($this->validateip($ip)) {
                        return $ip;
                    }
                }
            }
        }

        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
    }


    function validateip($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return false;
        }
        return true;
    }

    function operationdate($startdate,$mode,$enddate,$months) {

        $dateresult=false;
        if ($startdate==="") { $startdate=date('Y-m-d H:i'); }
        if ($enddate==="") { $enddate=date('Y-m-d H:i'); }

        switch ($mode) {

            case "add":
                $dateopration = strtotime('+' . $months . ' month', strtotime($startdate));
                $dateresult = date('Y-m-d H:i', $dateopration);
            break;

            case "deduct":
                $dateopration = strtotime('-' . $months . ' month', strtotime($startdate));
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

function urls_amigables($url) {

      // Tranformamos todo a minusculas

      $url = strtolower($url);

      //Rememplazamos caracteres especiales latinos

      $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

      $repl = array('a', 'e', 'i', 'o', 'u', 'n');

      $url = str_replace ($find, $repl, $url);

      // Añadimos los guiones

      $find = array(' ', '&', '\r\n', '\n', '+');
      $url = str_replace ($find, '-', $url);

      // Eliminamos y Reemplazamos otros carácteres especiales

      $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

      $repl = array('', '-', '');

      $url = preg_replace ($find, $repl, $url);

      return $url;

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


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

	  public function city()
	  {
			$meta = unserialize(file_get_contents('
			http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
			$latitud = $meta['geoplugin_latitude'];
			$longitud = $meta['geoplugin_longitude'];
			$city = $meta['geoplugin_city'];
			return $city;
	  }

}
?>
