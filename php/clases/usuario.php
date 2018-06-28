<?php
	
	require_once("../conexion/conexion.php");

	class Usuario extends Conectar{


			public function login($user,$pass){
					$res=array();
					$datos=array();
					$i=0; 

					$sql="SELECT  usuarios.empleado,
                                  usuarios.nombre,
                                  capturistas.descripcion 
                            FROM usuarios
                                JOIN capturistas ON capturistas.id=usuarios.empleado	
                            WHERE nombre='$user' AND clave=MD5('$pass')"; 
					$resultado = mysqli_query($this->con(), $sql); 
				    while ($res = mysqli_fetch_row($resultado)) {

				       $datos[$i]['empleado_id'] 	= $res[0];
                       $datos[$i]['usuario'] = $res[1]; 
                       $datos[$i]['capturista'] = $res[2]; 
 
				    } 


			return $datos;  
 
			} 

	}