<?php 
	
	require_once("../clases/inventario.php");
	$inventario = new Inventario();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) {
		 
		//Iniciar sesion
 		case 1: 
 			   echo (json_encode($inventario->registroAreas($_REQUEST['area_id'],$_REQUEST['nombre_area'])));
		break; 
		case 2: 
 			   echo (json_encode($inventario->cargarAreas()));
		break;  
		case 3: 
 			   echo (json_encode($inventario->buscarArea($_REQUEST['area_id'],$_REQUEST['area'])));
		break;
		case 4: 
 			   echo (json_encode($inventario->desHabilitarArea($_REQUEST['area_id'])));
		break;
		case 5: 
 			   echo (json_encode($inventario->eliminarArea($_REQUEST['area_id'])));
		break;
		case 6: 
 			   echo (json_encode($inventario->deshabilitarResponsivas($_REQUEST['equipo_id'])));
		break;

 
 	}
 
?>