<?php

	class Conectar
	{
		public static function  con(){
			$mysqli = new mysqli('192.168.2.51', 'axel', '12345678', 'fundacionamiga');


		  $mysqli->character_set_name();

		/* cambiar el conjunto de caracteres a utf8 */
		if (!$mysqli->set_charset("utf8")) {
		    $mysqli->error;
		    exit();
		} else {
		      $mysqli->character_set_name();
		}


			return $mysqli;
		}

	}
	 
?>