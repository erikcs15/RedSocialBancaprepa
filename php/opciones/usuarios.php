<?php 
	
	require_once("../clases/usuario.php");
	$usuario = new Usuario();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) { 
 		case 1: 
 			   echo (json_encode($usuario->login($_REQUEST['usuario'],$_REQUEST['password'])));
 		break; 
 
 
 		 
 	}
 
?>