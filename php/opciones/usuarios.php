<?php 
	
	require_once("../clases/usuario.php");
	$usuario = new Usuario();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) { 
 		case 1: 
 			   echo (json_encode($usuario->login($_REQUEST['usuario'],$_REQUEST['password'])));
		break; 
		case 2: 
			echo (json_encode($usuario->catalogoEmpresas($_REQUEST['empresa'])));
		break;
		case 3: 
			echo (json_encode($usuario->catalogoRoles($_REQUEST['rol'])));
		break; 
		case 4: 
			echo (json_encode($usuario->catalogoDocumentos($_REQUEST['doc'])));
		break; 
		case 5: 
			echo (json_encode($usuario->guardarEmpresas($_REQUEST['empresa'])));
		break;
		case 6: 
			echo (json_encode($usuario->guardarRoles($_REQUEST['rol'])));
		break; 
		case 7: 
			echo (json_encode($usuario->guardarDoc($_REQUEST['doc'])));
		break;
		case 8: 
			echo (json_encode($usuario->cargarEmpPorId($_REQUEST['empresa_id'])));
		break;
		case 9: 
			echo (json_encode($usuario->actualizarEmpresa($_REQUEST['empresa_id'],$_REQUEST['empresa'])));
		break;
		case 10: 
			echo (json_encode($usuario->cargarRolPorId($_REQUEST['rol_id'])));
		break;
		case 11: 
			echo (json_encode($usuario->actualizarRol($_REQUEST['rol_id'],$_REQUEST['rol'])));
		break; 
		case 12: 
			echo (json_encode($usuario->cargarDocPorId($_REQUEST['doc_id'])));
		break;
		case 13: 
			echo (json_encode($usuario->actualizarDoc($_REQUEST['doc_id'],$_REQUEST['doc'])));
		break; 
		case 14: 
			echo (json_encode($usuario->desEmp($_REQUEST['emp_id'])));
		break;
		case 15: 
			echo (json_encode($usuario->desRol($_REQUEST['rol_id'])));
		break;
		case 16: 
			echo (json_encode($usuario->desDoc($_REQUEST['doc_id'])));
		break; 
		
 	}
 
?>