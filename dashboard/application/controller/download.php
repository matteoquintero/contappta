<?php
	$base="../../_data/";
	$name=$_POST["nombre"];
	$vectorruta=explode("_data/", $_POST["ruta"]);
	$path=$base.$vectorruta[1];
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

	if( false === strpos( $filename, '.' ) )
	{
	  return false;
	}

	$extension = strtolower( pathinfo( basename( $filename ), PATHINFO_EXTENSION ) );

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

	  'zip' => 'application/zip',
	  'rar' => 'application/x-rar-compressed',
	  'exe' => 'application/x-msdownload',
	  'msi' => 'application/x-msdownload',
	  'cab' => 'application/vnd.ms-cab-compressed',

	  'mp3' => 'audio/mpeg',
	  'qt' => 'video/quicktime',
	  'mov' => 'video/quicktime',

	  'pdf' => 'application/pdf',
	  'psd' => 'image/vnd.adobe.photoshop',
	  'ai' => 'application/postscript',
	  'eps' => 'application/postscript',
	  'ps' => 'application/postscript',

	  'doc' => 'application/msword',
	  'rtf' => 'application/rtf',
	  'xls' => 'application/vnd.ms-excel',
	  'ppt' => 'application/vnd.ms-powerpoint',

	  'odt' => 'application/vnd.oasis.opendocument.text',
	  'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
	);

	if( !isset( $mime_types[$extension] ) )
	{
	  $mime = 'application/octet-stream';
	}
	else
	{
	  $mime = ( is_array( $mime_types[$extension] ) ) ? $mime_types[$extension][0] : $mime_types[$extension];
	}

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

?>