<?php 
	
	require_once("../clases/prestamo.php");
	$prestamos = new Prestamo();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) {
		 
		//Crear Solicitud
 		case 1: 
				echo (json_encode($prestamos->crearSolicitud($_REQUEST['capturista_id'],$_REQUEST['fecha_solicitud'],$_REQUEST['puesto_id'],$_REQUEST['sucursal_id'],$_REQUEST['empresa_id'],$_REQUEST['numTarjeta'],$_REQUEST['beneficiarioCuenta'],$_REQUEST['nombreBanco'],$_REQUEST['monto_solicitado'],$_REQUEST['quincenas'],$_REQUEST['meses_a_pagar'],$_REQUEST['interes_prestamo'],$_REQUEST['tipo_abono'],$_REQUEST['descuento_mensual'],$_REQUEST['monto_total'],$_REQUEST['inicio_descuento'],$_REQUEST['fin_descuento'], $_REQUEST['monto_letra'])));
		break; 
		case 2: 
				echo (json_encode($prestamos->cargarSolicitudesPorEmpleado($_REQUEST['capturista_id'])));
		break;
 
 	}
 
?>