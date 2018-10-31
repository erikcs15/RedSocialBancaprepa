<?php 
	
	require_once("../clases/prestamo.php");
	$inventario = new Inventario();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) {
		 
		//Iniciar sesion
 		case 1: 
 			   echo (json_encode($inventario->registroAreas($_REQUEST['area_id'],$_REQUEST['nombre_area'])));
		break; 
		
 
 	}
 
?>