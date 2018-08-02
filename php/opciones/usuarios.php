<?php 
	
	require_once("../clases/usuario.php");
	$usuario = new Usuario();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) {
		 
		//Iniciar sesion
 		case 1: 
 			   echo (json_encode($usuario->login($_REQUEST['usuario'],$_REQUEST['password'])));
		break; 
		//Cargar catalogo de empresas
		case 2: 
			echo (json_encode($usuario->catalogoEmpresas($_REQUEST['empresa'])));
		break;
		//Cargar catalogo de roles
		case 3: 
			echo (json_encode($usuario->catalogoRoles($_REQUEST['rol'])));
		break;
		//Cargar catalogo de tipo de documentos 
		case 4: 
			echo (json_encode($usuario->catalogoDocumentos($_REQUEST['doc'])));
		break;
		//Guardar empresas 
		case 5: 
			echo (json_encode($usuario->guardarEmpresas($_REQUEST['empresa'])));
		break;
		//Guardar roles
		case 6: 
			echo (json_encode($usuario->guardarRoles($_REQUEST['rol'])));
		break;
		//Guardar tipo de documentos 
		case 7: 
			echo (json_encode($usuario->guardarDoc($_REQUEST['doc'])));
		break;
		//Cargar empresa por ID
		case 8: 
			echo (json_encode($usuario->cargarEmpPorId($_REQUEST['empresa_id'])));
		break;
		//Update para editar empresa
		case 9: 
			echo (json_encode($usuario->actualizarEmpresa($_REQUEST['empresa_id'],$_REQUEST['empresa'])));
		break;
		//Cargar roles por id
		case 10: 
			echo (json_encode($usuario->cargarRolPorId($_REQUEST['rol_id'])));
		break;
		//update para editar roles
		case 11: 
			echo (json_encode($usuario->actualizarRol($_REQUEST['rol_id'],$_REQUEST['rol'])));
		break; 
		//cargar tipo de documentos por ID
		case 12: 
			echo (json_encode($usuario->cargarDocPorId($_REQUEST['doc_id'])));
		break;
		//Update para editar tipo de documentos
		case 13: 
			echo (json_encode($usuario->actualizarDoc($_REQUEST['doc_id'],$_REQUEST['doc'])));
		break;
		//deshabilitar empresas
		case 14: 
			echo (json_encode($usuario->desEmp($_REQUEST['emp_id'])));
		break;
		//Deshabilitar roles
		case 15: 
			echo (json_encode($usuario->desRol($_REQUEST['rol_id'])));
		break;
		//deshabilitar tipo de documentos
		case 16: 
			echo (json_encode($usuario->desDoc($_REQUEST['doc_id'])));
		break; 
		//Eliminar empresas
		case 17: 
			echo (json_encode($usuario->eliminarEmp($_REQUEST['emp_id'])));
		break; 
		//Eliminar rol
		case 18: 
			echo (json_encode($usuario->eliminarRol($_REQUEST['rol_id'])));
		break; 
		//Eliminar Tipo de documentos
		case 19: 
			echo (json_encode($usuario->eliminarDoc($_REQUEST['doc_id'])));
		break; 
		case 20: 
			echo (json_encode($usuario->cargarPublicaciones()));
		break;
		case 21: 
			echo (json_encode($usuario->agregarPublicaciones($_REQUEST['texto'],$_REQUEST['tipopub'])));
		break;  
		case 22: 
			echo (json_encode($usuario->cargarAccesos($_REQUEST['id_rol'])));
		break; 
		case 23: 
			echo (json_encode($usuario->habilitarAcceso($_REQUEST['id_rol'],$_REQUEST['id_menu'])));
		break;
		case 24: 
			echo (json_encode($usuario->deshabilitarAcceso($_REQUEST['id_rol'],$_REQUEST['id_menu'])));
		break;
		case 25: 
			echo (json_encode($usuario->guardarPublicacion($_REQUEST['titulo'],$_REQUEST['descripcion'],$_REQUEST['imagen'],$_REQUEST['documento_id'],$_REQUEST['rol_id'],$_REQUEST['empresa_id'],$_REQUEST['docuemento'])));
		break;
 	}
 
?>