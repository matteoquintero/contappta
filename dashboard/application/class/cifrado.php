<?php
class Cifrado
	{

	function __construct(){

	}
		public function encryptpassword($cadena){

			$password=md5(sha1($cadena));
			return $password;

		}

	}
?>