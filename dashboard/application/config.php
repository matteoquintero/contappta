<?php

@session_start();
//Smarty
require($_SERVER["DOCUMENT_ROOT"]."/smarty/libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->compile_check = true;
$smarty->left_delimiter = '{#';
$smarty->right_delimiter = '#}';
$smarty->template_dir = $_SERVER["DOCUMENT_ROOT"].BASE."page/template/";
$smarty->compile_dir  = $_SERVER["DOCUMENT_ROOT"].BASE."page/template_c/";
$smarty->loadPlugin('smarty_compiler_switch');

function IncluirArchivos($Ruta){
	define('PREFIJO_GENERAL', $Ruta);
	require("db/DBO.php");
	//DataObjects
	require(PREFIJO_GENERAL."db/requires.ini.php");
	//Clases
  require(PREFIJO_GENERAL."class/institucion.php");
  require(PREFIJO_GENERAL."class/acudiente.php");
  require(PREFIJO_GENERAL."class/grupo.php");
  require(PREFIJO_GENERAL."class/rol.php");
  require(PREFIJO_GENERAL."class/cifrado.php");
  require(PREFIJO_GENERAL."class/sesion.php");
  require(PREFIJO_GENERAL."class/utilidad.php");
  require(PREFIJO_GENERAL."class/noticia.php");
  require(PREFIJO_GENERAL."class/noticiareceptor.php");
  require(PREFIJO_GENERAL."class/news.php");
  require(PREFIJO_GENERAL."class/sendersnews.php");
  require(PREFIJO_GENERAL."class/answersnews.php");
  require(PREFIJO_GENERAL."class/users.php");
  require(PREFIJO_GENERAL."class/usuario.php");
  require(PREFIJO_GENERAL."class/plantilla.php");
  require(PREFIJO_GENERAL."class/messages.php");
  require(PREFIJO_GENERAL."class/sendersmessages.php");
  require(PREFIJO_GENERAL."class/mensaje.php");
  require(PREFIJO_GENERAL."class/mensajereceptor.php");
  require(PREFIJO_GENERAL."class/events.php");
  require(PREFIJO_GENERAL."class/sendersevents.php");
  require(PREFIJO_GENERAL."class/evento.php");
  require(PREFIJO_GENERAL."class/eventoreceptor.php");
  require(PREFIJO_GENERAL."class/revista.php");
  require(PREFIJO_GENERAL."class/institutions.php");
  require(PREFIJO_GENERAL."class/tipoinstitucion.php");
  require(PREFIJO_GENERAL."class/honors.php");
  require(PREFIJO_GENERAL."class/tiporeconocimiento.php");
  require(PREFIJO_GENERAL."class/reconocimiento.php");
  require(PREFIJO_GENERAL."class/reconocimientousuario.php");
}
function printVar( $variable, $title = "" ){ $var = print_r( $variable, true ); echo "<pre style='background-color:#000000; color:#00FF00; border: dashed thin #FFFFFF;position:relative;width: 100%;z-index: 9999;'><strong>[$title]</strong> $var</pre>"; }
function replace_unicode_escape_sequence($match) { return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE'); }
function unicode_decode($str) { return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $str);}
function spaces($str){ return ltrim(rtrim(trim($str))); }

function fileversion($url){
    $path = pathinfo($url);
    $scan= BASE.$path['dirname']."/".str_replace('.', MIN, $path['basename']);
    $filetime = filemtime($_SERVER['DOCUMENT_ROOT'].$scan);
    $newurl= BASE.$path['dirname']."/".str_replace('.', MIN, $path['basename'])."?v=".$filetime;
    echo $newurl;
}
function filetemplate($template){
	$arraytemplate=explode(".", $template);
    $newtemplate=$arraytemplate[0].MIN.$arraytemplate[1];
    return $newtemplate;
}

?>
