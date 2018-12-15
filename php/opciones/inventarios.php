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
		case 7: 
 			   echo (json_encode($inventario->buscarCp($_REQUEST['cp'])));
		break;
		case 8: 
 			   echo (json_encode($inventario->buscarCpCol($_REQUEST['cp'])));
		break;
		case 9: 
 			   echo (json_encode($inventario->registrarStock($_REQUEST['txtIdPagoEspecie'],$_REQUEST['txtFecha'],$_REQUEST['txtCoordinacion'],$_REQUEST['cboSucursal'],$_REQUEST['txtIdCoor'],$_REQUEST['txtDistribuidora'],$_REQUEST['txtPago'],$_REQUEST['cboEquipo'],$_REQUEST['txtMarca'],$_REQUEST['txtModelo'],$_REQUEST['txtSerie'],$_REQUEST['txtDescripcion'],$_REQUEST['txtUbicacion'],$_REQUEST['txtEstatus'])));
		break;
		case 10: 
 			   echo (json_encode($inventario->cargarPagosEspecie()));
		break;
		case 11: 
 			   echo (json_encode($inventario->deshabilitarPagoEspecie($_REQUEST['txtIdCancelacion'],$_REQUEST['txtMotivo'])));
		break;
		case 12: 
 			   echo (json_encode($inventario->cargarImgStock($_REQUEST['txtId'],$_REQUEST['txtDocName'])));
		break;
		case 13: 
 			   echo (json_encode($inventario->buscarPago($_REQUEST['txtId'])));
		break;
		case 14: 
 			   echo (json_encode($inventario->cargarStock()));
		break;
		case 15: 
 			   echo (json_encode($inventario->cargarCarousel($_REQUEST['id'])));
		break;
		case 16: 
 			   echo (json_encode($inventario->cargarPrevioEnSolicitud($_REQUEST['id'])));
		break;



 
 	}
 
?>