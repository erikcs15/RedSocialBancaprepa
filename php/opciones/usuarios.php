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
		 
 
 
 		 
 	}
 
?>