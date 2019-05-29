<?php 
	
	require_once("../clases/grupo.php");
	$grupo = new Grupo();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) {
		 
		//Iniciar sesion
 		case 1: 
 			   echo (json_encode($grupo->listaDeEmpleadosActivos()));
			break; 
		case 2: 
 			   echo (json_encode($grupo->listaDeEmpleadosActivosPorNombre($_REQUEST['empleado'])));
			break; 
		case 3: 
 			   echo (json_encode($grupo->empleadoTmp($_REQUEST['empleado_id'])));
			break; 
		case 4: 
 			   echo (json_encode($grupo->cargarIntegrantesTmpDeGrupo()));
			break; 
		case 5: 
 			   echo (json_encode($grupo->eliminarIntegrante($_REQUEST['integrante_id'])));
			break; 
		case 6: 
 			   echo (json_encode($grupo->guardarGrupo($_REQUEST['nombre'],$_REQUEST['fecha_inicial'],$_REQUEST['fecha_final'])));
			break; 
		case 7: 
 			   echo (json_encode($grupo->gruposCreados()));
			break;
		case 8: 
 			   echo (json_encode($grupo->confirmarGrupo($_REQUEST['integrante_id'],$_REQUEST['grupo_id'])));
			break;
		case 9: 
 			   echo (json_encode($grupo->detalleDeGrupo($_REQUEST['grupo_id'])));
			break;
		case 10: 
 			   echo (json_encode($grupo->cargarGruposPorCapturista($_REQUEST['capturista_id'])));
			break;
		case 11: 
 			   echo (json_encode($grupo->cargarActividadesPorGrupo($_REQUEST['grupo_id'])));
			break;
		case 12: 
			   echo (json_encode($grupo->cargarSubActividades($_REQUEST['act_id'])));
			break;

			


	  

 
 	}
 
?>